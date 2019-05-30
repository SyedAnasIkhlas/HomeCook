<?php 
	class Modal
	{

		// public  function createModal($title, $body,$button)
		// {
		// 	$modal = modal($title, $body, $button);
		// 	return $modal;
		// }

		public static function createModal($buttonText, $imageSrc, $title, $body, 
											$buttonDone,$data_target, $name,$onclick)
		{ 
			

			if ($buttonDone == null) 
			{
				$doneButton = "";
			}
			else
			{
				$doneButton = "<button type='button' class='btn btn-primary' name='$name' onclick='$onclick' >$buttonDone</button>";
			}

			if ($onclick == null) 
			{
				$onclick = "";
			}
			else
			{
				$onclick = $onclick;
			}

			if ($name == null) 
			{
				$name = "";
			}
			else
			{
				$name = $name;
			}

		// exampleModal
			$image = 
				"<button  class='btn modal_image' data-toggle='modal'  data-target='#$data_target'>
				  $imageSrc
				</button>";

			$button = 
				"<button class='btn btn-primary' data-toggle='modal' data-target='#$data_target'>
				  $buttonText
				</button>";		


			if ($buttonText == null) 
			{
				$buttonText = "";
				$button = "";
				$image;
				

			}
			else
			{
				$buttonText = $buttonText;
				$button;
				 
				$image = "";
			}

			if ($imageSrc == null) 
			{
				$buttonText = $buttonText;
				$button;
				 
				$image = "";

			}
			else
			{
				$button = "";
				$image;
				
			}

		return"<!-- Button trigger modal -->
				$buttonText
				$image

			<!-- Modal -->
			<div class='modal fade' id='$data_target' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
			  <div class='modal-dialog' role='document'>
			    <div class='modal-content'>
			      <div class='modal-header'>
			        <h5 class='modal-title' id='exampleModalLabel'>$title</h5>
			        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
			          <span aria-hidden='true'>&times;</span>
			        </button>
			      </div>
			      <div class='modal-body'>
			        $body
			      </div>
			      <div class='modal-footer'>
			        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
			        $doneButton
			      </div>
			    </div>
			  </div>
			</div>";

		}



	public static function createCustomModal($closeButton, $buttonText, $imageSrc, $title, $body, 
											$buttonDone,$data_target, $name,$onclick, $closeButtonText,$modalFooter)
		{ 
			if ($modalFooter == null) 
			{
				$modalFooter = "";
			}
			else
			{
				$modalFooter = "<div class='modal-footer'>
									$closeButton
									 $doneButton
							      </div>";
			}

			if ($closeButton == null) 
			{
				$closeButton = "";
			}
			else
			{      
				$closeButton = "<button type='button' class='btn btn-secondary' data-dismiss='modal'>$closeButtonText</button>";
			}

			if ($closeButtonText == null) 
			{
				$closeButtonText = "close";
			}
			else
			{
				$closeButtonText = $closeButtonText;
			}

			if ($closeButton == null) 
			{
				$closeButton = "";
			}
			else
			{
				$closeButton = "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
			}

			if ($buttonDone == null) 
			{
				$doneButton = "";
			}
			else
			{
				$doneButton = "<button type='button' class='btn btn-primary' name='$name' onclick='$onclick' >$buttonDone</button>";
			}

			if ($onclick == null) 
			{
				$onclick = "";
			}
			else
			{
				$onclick = $onclick;
			}

			if ($name == null) 
			{
				$name = "";
			}
			else
			{
				$name = $name;
			}

		// exampleModal
			$image = 
				"<button  class='btn modal_image' data-toggle='modal'  data-target='#$data_target'>
				  $imageSrc
				</button>";

			$button = 
				"<button class='btn btn-primary' data-toggle='modal' data-target='#$data_target'>
				  $buttonText
				</button>";		


			if ($buttonText == null) 
			{
				$buttonText = "";
				$button = "";
				$image;
				

			}
			else
			{
				$buttonText = $buttonText;
				$button;
				 
				$image = "";
			}

			if ($imageSrc == null) 
			{
				$buttonText = $buttonText;
				$button;
				 
				$image = "";

			}
			else
			{
				$button = "";
				$image;
				
			}

		return"<!-- Button trigger modal -->
				$buttonText
				$image

			<!-- Modal -->
			<div class='modal fade' id='$data_target' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
			  <div class='modal-dialog' role='document'>
			    <div class='modal-content'>
			      <div class='modal-header'>
			        <h5 class='modal-title' id='exampleModalLabel'>$title</h5>
			        $closeButton
			          <span aria-hidden='true'>&times;</span>
			        </button>
			      </div>
			      <div class='modal-body'>
			        $body
			      </div>
			      $modalFooter
			    </div>
			  </div>
			</div>";

		}

	}
 ?>