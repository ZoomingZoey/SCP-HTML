
function SpeakContent(message) {
  if (message == null) return;
  
}

function Speak() {
  

  let elements = document.querySelectorAll('[id=speech]');
  for(let i = 0; i < elements.length; i++) {
    let content = elements[i].textContent;
    console.log(content);
    let words = content.split(" ");
    console.log(words);
    for (let j = 0; j < words.length; j++) {
      const synth = new SpeechSynthesisUtterance();
      let voices = window.speechSynthesis.getVoices();
      synth.voice = voices[1];
      synth.rate = 1;
      synth.volume = 1;
      let word = words[j];
      synth.text = word;
      window.speechSynthesis.speak(synth);
    }
  }
}