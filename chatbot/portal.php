<style>
	#chat_convo{
		max-height: 65vh;
	}
	#chat_convo .direct-chat-messages{
		min-height: 250px;
		height: inherit;
	}
	#chat_convo .card-body {
		overflow: auto;
	}
</style>
<script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
</script>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-8 <?php echo isMobileDevice() == false ?  "offset-2" : '' ?>">
			<div class="card direct-chat direct-chat-primary" id="chat_convo">
              <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">Ask Me</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg mr-4">
                    <img class="direct-chat-img border-1 border-primary" src="<?php echo validate_image($_settings->info('bot_avatar')) ?>" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      <?php echo $_settings->info('intro') ?>
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  
                  <!-- /.contacts-list -->
                </div>
                <div class="end-convo"></div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form id="send_chat" method="post">
                  <div class="input-group">
                    <textarea type="text" name="message" id="message" placeholder="Type Message ..." class="form-control" required=""></textarea>
                    <span class="input-group-append">
                      <button type="submit" class="btn btn-primary">Send</button> <button type="button" class="bg-transparent border-0"> <span id="start"><i class="fas fa-microphone text-primary fa-2x"></i></span></button> 
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
		</div>
	</div>
</div>
<div class="d-none" id="user_chat">
	<div class="direct-chat-msg right  ml-4">
        <img class="direct-chat-img border-1 border-primary" src="<?php echo validate_image($_settings->info('user_avatar')) ?>" alt="message user image">
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text"></div>
        <!-- /.direct-chat-text -->
    </div>
</div>
<div class="d-none" id="bot_chat">
	<div class="direct-chat-msg mr-4">
        <img class="direct-chat-img border-1 border-primary" src="<?php echo validate_image($_settings->info('bot_avatar')) ?>" alt="message user image">
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text"></div>
        <!-- /.direct-chat-text -->
  </div>
</div>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('[name="message"]').keypress(function(e){
			console.log()
			if(e.which === 13 && e.originalEvent.shiftKey == false){
				$('#send_chat').submit()
				return false;
			}
		})
		$('#send_chat').submit(function(e){
			e.preventDefault();
			var message = $('[name="message"]').val();
			if(message == '' || message == null) return false;
			var uchat = $('#user_chat').clone();
			uchat.find('.direct-chat-text').html(message);
			$('#chat_convo .direct-chat-messages').append(uchat.html());
			$('[name="message"]').val('')
			$("#chat_convo .card-body").animate({ scrollTop: $("#chat_convo .card-body").prop('scrollHeight') }, "fast");

			$.ajax({
				url:_base_url_+"classes/Master.php?f=get_response",
				method:'POST',
				data:{message:message},
				error: err=>{
					console.log(err)
					alert_toast("An error occured.",'error');
					end_loader();
				},
				success:function(resp){
					if(resp){
						resp = JSON.parse(resp)
						if(resp.status == 'success'){
							var bot_chat = $('#bot_chat').clone();
								bot_chat.find('.direct-chat-text').html(resp.message);
								$('#chat_convo .direct-chat-messages').append(bot_chat.html());
								$("#chat_convo .card-body").animate({ scrollTop: $("#chat_convo .card-body").prop('scrollHeight') }, "fast");
						}
					}
				}
			})
		})

	})

	// speech recognition api

	// const searchForm = document.querySelector("#search-form");
  //         const searchFormInput = searchForm.querySelector("input"); // <=> document.querySelector("#search-form input");
  //         const info = document.querySelector(".info");

  //         // The speech recognition interface lives on the browser’s window object
  //         const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition; // if none exists -> undefined

  //         if(SpeechRecognition) {
  //           console.log("Your Browser supports speech Recognition");
            
  //           const recognition = new SpeechRecognition();
  //           recognition.continuous = true;
  //           // recognition.lang = "en-US";

  //           searchForm.insertAdjacentHTML("beforeend", '<button type="button"><i class="fas fa-microphone"></i></button>');
  //           searchFormInput.style.paddingRight = "50px";

  //           const micBtn = searchForm.querySelector("button");
  //           const micIcon = micBtn.firstElementChild;

  //           micBtn.addEventListener("click", micBtnClick);
  //           function micBtnClick() {
  //             if(micIcon.classList.contains("fa-microphone")) { // Start Voice Recognition
  //               recognition.start(); // First time you have to allow access to mic!
  //             }
  //             else {
  //               recognition.stop();
  //             }
  //           }

  //           recognition.addEventListener("start", startSpeechRecognition); // <=> recognition.onstart = function() {...}
  //           function startSpeechRecognition() {
  //             micIcon.classList.remove("fa-microphone");
  //             micIcon.classList.add("fa-microphone-slash");
  //             searchFormInput.focus();
  //             console.log("Voice activated, SPEAK");
  //           }

  //           recognition.addEventListener("end", endSpeechRecognition); // <=> recognition.onend = function() {...}
  //           function endSpeechRecognition() {
  //             micIcon.classList.remove("fa-microphone-slash");
  //             micIcon.classList.add("fa-microphone");
  //             searchFormInput.focus();
  //             console.log("Speech recognition service disconnected");
  //           }

  //           recognition.addEventListener("result", resultOfSpeechRecognition); // <=> recognition.onresult = function(event) {...} - Fires when you stop talking
  //           function resultOfSpeechRecognition(event) {
  //             const current = event.resultIndex;
  //             const transcript = event.results[current][0].transcript;
              
  //             if(transcript.toLowerCase().trim()==="stop recording") {
  //               recognition.stop();
  //             }
  //             else if(!searchFormInput.value) {
  //               searchFormInput.value = transcript;
  //             }
  //             else {
  //               if(transcript.toLowerCase().trim()==="go") {
  //                 searchForm.submit();
  //               }
  //               else if(transcript.toLowerCase().trim()==="reset input") {
  //                 searchFormInput.value = "";
  //               }
  //               else {
  //                 searchFormInput.value = transcript;
  //               }
  //             }
  //             // searchFormInput.value = transcript;
  //             // searchFormInput.focus();
  //             // setTimeout(() => {
  //             //   searchForm.submit();
  //             // }, 500);
  //           }
            
  //           info.textContent = 'Voice Commands: "stop recording", "reset input", "go"';
            
  //         }
  //         else {
  //           console.log("Your Browser does not support speech Recognition");
  //           info.textContent = "Your Browser does not support Speech Recognition";
  //         }

  if ("webkitSpeechRecognition" in window) {
  let speechRecognition = new webkitSpeechRecognition();
  let final_transcript = "";

  speechRecognition.continuous = true;
  speechRecognition.interimResults = true;
  speechRecognition.lang = document.querySelector("#select_dialect").value;

  speechRecognition.onstart = () => {
    document.querySelector("#status").style.display = "block";
  };
  speechRecognition.onerror = () => {
    document.querySelector("#status").style.display = "none";
    console.log("Speech Recognition Error");
  };
  speechRecognition.onend = () => {
    document.querySelector("#status").style.display = "none";
    console.log("Speech Recognition Ended");
  };

  speechRecognition.onresult = (event) => {
    let interim_transcript = "";

    for (let i = event.resultIndex; i < event.results.length; ++i) {
      if (event.results[i].isFinal) {
        final_transcript += event.results[i][0].transcript;
      } else {
        interim_transcript += event.results[i][0].transcript;
      }
    }
    document.querySelector("#final").innerHTML = final_transcript;
    document.querySelector("#interim").innerHTML = interim_transcript;
  };

  document.querySelector("#start").onclick = () => {
    speechRecognition.start();
  };
  document.querySelector("#stop").onclick = () => {
    speechRecognition.stop();
  };
} else {
  console.log("Speech Recognition Not Available");
}
</script>
