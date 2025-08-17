<script setup>
import { ref, onMounted } from 'vue'

/* Typing effect setup */
const messages = [
  "Échangez vos compétences, pas votre argent ",
  "Donnez et recevez des compétences facilement ",
  "Apprenez en partageant votre savoir "
]

const displayedText = ref("")
let currentMessage = 0
let charIndex = 0

const typingSpeed = 50  
const deletingSpeed = 50 
const pauseTime = 1500   

function typeLoop() {
  const message = messages[currentMessage]

  if (charIndex < message.length) {
    displayedText.value += message[charIndex]
    charIndex++
    setTimeout(typeLoop, typingSpeed)
  } else {
    setTimeout(() => deleteText(), pauseTime)
  }
}

function deleteText() {
  if (charIndex > 0) {
    displayedText.value = displayedText.value.slice(0, -1)
    charIndex--
    setTimeout(deleteText, deletingSpeed)
  } else {
    currentMessage = (currentMessage + 1) % messages.length
    setTimeout(typeLoop, typingSpeed)
  }
}

/*Start typing effect on mount and setup IntersectionObserver*/

onMounted(() => {
    typeLoop();
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                console.log("Hero section is visible" + entry.target);
                entry.target.classList.add('in-view');
            }else {
                entry.target.classList.remove('in-view');
            }
        })
    }, {})
    const animateElements = document.querySelectorAll('.scale');
    animateElements.forEach(element => {
        observer.observe(element)
    }); 
})
</script>

<template>
  <section class="heroSec">
    <div class="header">
      <img src="/Resources/images/logo.png" alt="" class="logo">
    </div>
    <div class="content">
      <div class="text ">
        <h1 class="sansation-bold">{{ displayedText }}</h1>
        <div class="othertext">
            <p class="sansation-regular">
            Donnez une heure de votre savoir, gagnez une heure d’apprentissage dans un autre domaine.
            </p>
            <button class="start">
            <p class="sansation-bold">Commencer gratuitement</p>
            <img src="/Resources/icons/fleche-cercle-droite.png" alt="">
            </button>
        </div>
      </div>
      <img src="/Resources/images/heroSecImage.png" alt="" class="heroSecImage scale">
    </div>
  </section>
  

  <section class="tuto">
    <div class="content scale">
      <h1 class="sansation-bold">Comment ça marche ?</h1>
      <p class="sansation-regular">C’est simple, rapide et gratuit !</p>
      <div class="steps scale">
        <div class="step scale">
          <p class="sansation-regular">Créez votre compte en quelques clics.</p>
        </div>
        <div class="step scale">
          <p class="sansation-regular">Proposez vos compétences et découvrez celles des autres.</p>
        </div>
        <div class="step scale">
          <p class="sansation-regular">Échangez vos compétences sans débourser un centime.</p>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>

/*general*/
section{
    width: 100%;
    min-height: 100vh;
}
.scale{
    opacity: 0;
    scale: 0.5;
    transition: .6s ease;
}
.scale.in-view{
    opacity: 1;
    scale: 1;
}

/* Hero Section */


.header{
    display: flex;
    justify-content: start;
    align-items: center;
}
.logo{
    width: 130px;
    height: 100%;
}
.heroSec{
    background-image: linear-gradient( 174.2deg,  rgba(255,244,228,1) 7.1%, rgba(240,246,238,1) 67.4% );        

    display: grid;
    grid-template-rows: 15% 85%;
    padding: 0 2% 8% 5%;
    box-sizing: border-box;
}
.content{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}
.text{
    box-sizing: border-box;
    display: grid;
    grid-template-rows: 1fr 1fr;
    align-items: center;
    justify-content: center;
}
.text h1{
    font-size: 3rem;
    text-align: center;
    font-weight: 700;
}
.othertext{
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 2rem;
}
.othertext p{
    font-size: 1rem;
    margin-bottom: 1rem;
    text-align: center;
}
.heroSecImage{
    height: 520px;
    width: 520px;
    margin-left: 80px;
}
.start{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    padding: 10px 0;
    width: 280px;
    background-color: #ff8f56;
    border: transparent;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    transition: .3s;
}
.start:hover{
    cursor: pointer;
    background-color: #ff7b39;
    box-shadow: 0 2px 9px rgba(0, 0, 0, 0.5);

}
.start p {
    color: white;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0;
    margin-right: 10px;
}
.start img{
    height: 20px;
    width: 20px;
}

/* Tuto Section */
.tuto .content{
    width: 80%;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.tuto h1{
    font-size: 2.5rem;
}          
</style>
