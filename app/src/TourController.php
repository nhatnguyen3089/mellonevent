<?php
namespace App;

use SilverStripe\Control\Controller;
use SilverStripe\ORM\ValidationException;
use SilverStripe\Dev\Debug;
use SilverStripe\Core\Injector\Injector;
use Tour;
use DOMDocument;
use DOMXPath;
use Venue;
use SilverStripe\Assets\Image;
use SilverStripe\Assets\Folder;
use TourInfo;
use TourArtist;
use TourPartner;

class TourController extends Controller
{
    private static $allowed_actions = [
        'InsertData'
    ];

    public function InsertData($request)
    {
		
		
		$url = 'https://mellenevents.com/past-tours';
		$html = $this->fetchHTML($url);
		$data = $this->extractLink($html);
		
		$i = 0;
		foreach($data as $t){
			$tour = Tour::get()->filter(['URLSegment' => trim($t['URLSegment'])])->first();
			/*
			$tour = Tour::create();
			$tour->ParentID = 24;
			$tour->Title = $t['Title'];
			if(isset($t['TourDate'])){
				$tour->TourDate = $t['TourDate'];
			}
			$tour->Content = $t['Content'];
			$tour->TourDescriptionLine = $t['TourDescriptionLine'];
			*/
			
			//if($tour){
				
				//if(isset($t['Featuring'])){
					//$tour->TourFeaturing = $t['Featuring'];
				//}
				/*
				if(isset($t['TicketDescription'])){
					$tour->TicketDescription = $t['TicketDescription'];
				}
				if(isset($t['BuyTicketLink'])){
					$tour->BuyTicketLink = $t['BuyTicketLink'];
				}
				*/
				
				/*
				if(isset($t['Venues'])){
					$VenueData = Venue::get()->filter(['Title' => trim($t['Venues'])])->first();
					if(isset($VenueData->ID)){
						$venue = Venue::get()->byID($VenueData->ID);
						if ($venue->exists()) {
							$tour->Venues()->addMany($venue);
							$tour->write();
						}
					}

				}
				*/
				
				//$tour->URLSegment = $t['URLSegment'];
				//$tour->write();
			//}
			
			
			
			if(isset($tour->ID) && $tour->ID > 0){
				
				$data[$i]['AdminLink'] = 'https://mellenevents.upstairs.co/admin/pages/edit/show/'.$tour->ID;
				$data[$i]['CurrentTitle'] = $tour->Title;
				
				/*
				$folderPath = 'Uploads';
				$folder = Folder::find_or_make($folderPath);
				
				$imageUrl = $t['ThumbImageLink'];
				$imageData = file_get_contents($imageUrl);
				$image = Image::create();
				$image->setFromString($imageData, pathinfo($imageUrl, PATHINFO_BASENAME));
				$image->ParentID = $folder->ID;
				$image->write();
				$tour->TourImageID = $image->ID;
				$tour->write();
				
				if(isset($t['FullImageLink'])){
					$imageUrl = $t['FullImageLink'];
					$imageData = file_get_contents($imageUrl);
					$image = Image::create();
					$image->setFromString($imageData, pathinfo($imageUrl, PATHINFO_BASENAME));
					$image->ParentID = $folder->ID;
					$image->write();
					$tour->TourImageBannerID = $image->ID;
					$tour->write();
				}
				
				
				if(isset($t['Info'])){
					foreach($t['Info'] as $tinfo){
						$tourInfo = TourInfo::create();
						$tourInfo->Title = $tinfo['Title'];
						$tourInfo->Description = $tinfo['Description'];
						$tourInfo->TourID = $tour->ID;
						$tourInfo->write();
					}
				}
				*/
				
				/*
				if(isset($t['Artist'])){
					$folderPath = 'TourArtist';
					$folder = Folder::find_or_make($folderPath);
					foreach($t['Artist'] as $tartist){
						$tourArtist = TourArtist::create();
						$tourArtist->Title = $tartist['Title'];
						$tourArtist->Description = $tartist['Description'];
						$tourArtist->TourID = $tour->ID;
						$tourArtist->write();
						if($tourArtist->ID > 0){
							if(isset($tartist['Image'])){
								$imageUrl = 'https://mellenevents.com/'.$tartist['Image'];
								$imageData = file_get_contents($imageUrl);
								$image = Image::create();
								$image->setFromString($imageData, pathinfo($imageUrl, PATHINFO_BASENAME));
								$image->ParentID = $folder->ID;
								$image->write();
								$tourArtist->ImageID = $image->ID;
								$tourArtist->write();
							}
						}
					}
				}
				*/
				
				/*
				if(isset($t['Partner'])){
					$folderPath = 'TourPartner';
					$folder = Folder::find_or_make($folderPath);
					foreach($t['Partner'] as $tpartner){
						$tourPartner = TourPartner::create();
						$tourPartner->TourID = $tour->ID;
						$tourPartner->write();
						if($tourPartner->ID > 0){
							if(isset($tpartner['Image'])){
								$imageUrl = 'https://mellenevents.com/'.$tpartner['Image'];
								$imageData = file_get_contents($imageUrl);
								$image = Image::create();
								$image->setFromString($imageData, pathinfo($imageUrl, PATHINFO_BASENAME));
								$image->ParentID = $folder->ID;
								$image->write();
								$tourPartner->ImageID = $image->ID;
								$tourPartner->write();
							}
						}
					}
				}
				*/
				
				$i++;
			}
			

		}
		echo '<pre>';
		print_r($data);
		die();
		
		
		/*
		$tour = Tour::create();
		
		$tour->Title = "Example Page";
		$tour->Content = "This is the content of the example page.";
		$tour->TourDate = date('Y-m-d'); // Assuming you want to set the current date
		$tour->ParentID = 1; // Assuming you want to set the current date

		// Write the page to the database
		$tour->write();

		// Output the ID of the newly created page
		Debug::dump($tour->ID);
		
		$folderPath = 'Uploads';
		$folder = Folder::find_or_make($folderPath);
		
		$imageUrl = 'https://mellenevents.com/assets/Uploads/poster-socials-1300x500-new.jpg';
        $imageData = file_get_contents($imageUrl);
        $image = Image::create();
        $image->setFromString($imageData, pathinfo($imageUrl, PATHINFO_BASENAME));
		$image->ParentID = $folder->ID;
        $image->write();
		
		$tour->TourImageID = $image->ID;
		$tour->write();
		*/
        
    }
	
	protected function fetchHTML($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$html = curl_exec($ch);
		curl_close($ch);
		return $html;
	}


	protected function extractLink($html) {
		$doc = new DOMDocument();
		@$doc->loadHTML($html); // Suppress warnings
		$xpath = new DOMXPath($doc);
		$elements = $xpath->query('//div[@class="home-text"]/a');
		$image_elements = $xpath->query('//div[@class="image-holder"]/img');
		$i = 0;
		foreach ($elements as $element) {
			$page_link = $element->getAttribute('href');
			$img_thumb = $image_elements[$i]->getAttribute('src');
			$html = $this->fetchHTML('https://mellenevents.com/'.$page_link);
			$data[] = $this->extractData($html, $img_thumb, $page_link);
			$i++;
			//if($i >= 3) break;
		}
		return $data;
	}
	
	protected function extractData($html, $img_thumb, $page_link) {
		$doc = new DOMDocument();
		@$doc->loadHTML($html); // Suppress warnings
		$xpath = new DOMXPath($doc);
		$data = [];
		
		/*
		$result = $xpath->query('//div[@class="body-content"]/h1');
		$data['TourDescriptionLine'] = $result->item(0)->nodeValue;
		
		$data['ThumbImageLink'] = 'https://mellenevents.com'.$img_thumb;
		
		$result = $xpath->query('/html/body/div[3]/div/div[1]/img');
		if($result->item(0)){
			$data['FullImageLink'] = 'https://mellenevents.com'.$result->item(0)->getAttribute('src');
		}
		*/
		
		$paragraphs = $xpath->query("//div[@class='paragraph']");
		foreach ($paragraphs as $paragraph) {
			
			$textContent = trim($paragraph->textContent);
			if (strstr($textContent, 'EVENT')) {
				$data['Title'] = str_replace('EVENT ', '', $textContent);
				$data['PageLink'] = '<a href="https://mellenevents.upstairs.co'.$page_link.'">'.$page_link.'</a>';
				$data['URLSegment'] = trim(str_replace('/past-tours/', '', $page_link), '/');
				$data['OriginalPageLink'] = '<a href="https://mellenevents.com'.$page_link.'">'.$page_link.'</a>';
			}
			
			//if (strstr($textContent, 'FEATURING')) {
				//$data['Featuring'] = str_replace('FEATURING ', '', $textContent);
			//}
			/*
			if (strstr($textContent, 'DATE')) {
				$data['TourDate'] = str_replace('DATE ', '', $textContent);
			}
			if (strstr($textContent, 'TICKETS')) {
				$textContent = trim($doc->saveHTML($paragraph));
				$data['TicketDescription'] = str_replace('TICKETS', '', $textContent);
			}
			*/
			//if (strstr($textContent, 'VENUE')) {
				//$venues = str_replace('VENUE ', '', $textContent);
				//$venues = explode(',', $venues);
				//$data['Venues'] = $venues;
			//}
			
		}
		
		/*
		$ticket_link = $xpath->query('//a[@class="btn-link"]');
		if($ticket_link && !empty($ticket_link)){
			if($ticket_link->item(0)){
				$data['BuyTicketLink'] = $ticket_link->item(0)->getAttribute('href');
			}
		}
		
		$result = $xpath->query('/html/body/div[3]/div/div[2]/div/div[2]');
		$data['Content'] = $doc->saveHTML($result->item(0));
		
		$blocks = $xpath->query("//div[contains(@class, 'accordian-block')]");
		$i = 0;
		foreach ($blocks as $block) {
			$data['Info'][$i]['Title'] = $block->getElementsByTagName('h4')->item(0)->nodeValue;
			$data['Info'][$i]['Description'] = $doc->saveHTML($block->getElementsByTagName('div')->item(1));
			$i++;
		}
		*/
		
		
		//$imageSrcList = $xpath->query('//div[@class="main-content"]/div[@class="col-sm-6 accordian-img"]/div[@class="img-arae"]/img/@src');
		$h2List = $xpath->query('//div[@class="main-content"]/div[@class="col-sm-6 accordian-img"]/div[@class="img-arae"]/h2');
		//$imgAreaList = $xpath->query('//div[@class="main-content"]/div[@class="col-sm-6 accordian-img"][2]/div[@class="img-arae"]');
		
		for ($i = 0; $i < $h2List->length; $i++) {
			//$imageSrc = $imageSrcList->item($i)->nodeValue;
			$h2Content = $h2List->item($i)->nodeValue;
			//$htmlContent = $doc->saveHTML($imgAreaList->item($i));
			//$data['Artist'][$i]['Image'] = $imageSrc;
			$data['Artist'][$i]['Title'] = $h2Content;
			//$data['Artist'][$i]['Description'] = $htmlContent;
		}
		
		
		$imageSrcList = $xpath->query('//div[@class="accordion-content"]/ul[@class="widget logos"]/li/img/@src');
		$i = 0;
		foreach ($imageSrcList as $imageSrcNode) {
			$imageSrc = $imageSrcNode->nodeValue;
			$data['Partner'][$i]['Image'] = $imageSrc;
			$i++;
		}
		
		return $data;
	}
	
	
}