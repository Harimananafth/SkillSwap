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
    const scale = document.querySelectorAll('.scale');
    scale.forEach(element => {
        observer.observe(element)
    }); 
    const upEntry = document.querySelectorAll('.upEntry');
    upEntry.forEach(element => {
        observer.observe(element)
    }); 
    const leftEntry = document.querySelectorAll('.leftEntry');
    leftEntry.forEach(element => {
        observer.observe(element)
    }); 
    const rightEntry = document.querySelectorAll('.rightEntry');
    rightEntry.forEach(element => {
        observer.observe(element)
    }); 
    
})
</script>

<template>
  <section class="heroSec">
    <div class="header">
      <img src="" alt="" class="logo">
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
    <svg class="separator" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#d1ac94" fill-opacity="1" 
          d="M0,128L48,133.3C96,139,192,149,288,138.7C384,128,480,96,576,85.3C672,75,768,85,864,101.3C960,117,1056,139,1152,133.3C1248,128,1344,96,1392,80L1440,64L1440,0L0,0Z"></path>
    </svg>
  </section>
  

  <section class="tuto">
    <h1 class="sansation-bold scale"> Comment ça marche ?</h1>
    <div class="cardContainer">
      <div class="card leftEntry">
        <div class="imgContainer1">
          <img src="/Resources/icons/guitare.png" alt="" class="cardImg">
        </div>
        <p class="sansation-regular">Proposez vos compétences</p>
      </div>
      <div class="card upEntry">
        <div class="imgContainer2">
          <img src="/Resources/icons/programmation.png" alt="" class="cardImg">
        </div>
        <p class="sansation-regular">Trouvez ce dont vous avez besoin</p>
      </div>
      <div class="card rightEntry">
        <div class="imgContainer3">
          <img src="/Resources/icons/echange.png" alt="" class="cardImg">
        </div>
        <p class="sansation-regular">Échangez via un système de crédits</p>
      </div>

    </div>
  </section>
</template>

<style scoped>

/*general*/
section{
    width: 100%;
    min-height: 100vh;
    color: white;

}
.scale{
    opacity: 0;
    scale: 0.5;
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);

}
.scale.in-view{
    opacity: 1;
    scale: 1;
}
.upEntry{
    opacity: 0;
    transform: translateY(30%);
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);

}
.upEntry.in-view{
    opacity: 1;
    transform: translateY(0);
}
.leftEntry{
    opacity: 0;
    transform: translateX(-100%);
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);

}
.leftEntry.in-view{
    opacity: 1;
    transform: translateY(0);
}
.rightEntry{
    opacity: 0;
    transform: translateX(100%);
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);

}
.rightEntry.in-view{
    opacity: 1;
    transform: translateY(0);
}
/* Hero Section */


.header{
    display: flex;
    justify-content: start;
    align-items: center;
}
.logo{
    width: 130px;
}
.heroSec{
    background: #F3904F;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #3B4371, #F3904F);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #3B4371, #F3904F); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    display: grid;
    grid-template-rows: 10vh 90vh;
    padding: 1% 2% 9% 5%;
    box-sizing: border-box;
    position: relative;

}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
.content{
  display: grid;
  grid-template-columns: 65% 35%;
  align-items: center;
  justify-content: center;
  z-index: 20;
  padding-bottom: 5%;
  box-sizing: border-box;
    animation: fadeIn .5s ease-in;

}
.text{
    box-sizing: border-box;
    display: grid;
    grid-template-rows: 1fr 1fr;
    align-items: center;
}
.text h1{
    font-size: 3rem;
    text-align: left;
    font-weight: 700;
}
.othertext{
    height: 100%;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 1rem;
    align-items: start;
    margin-top: 2rem;
}
.othertext p{
    font-size: 1rem;
    margin-bottom: 1rem;
    text-align: left;
    width: 100%;
}
.heroSecImage{
    height: 400px;
    width: 400px;
    margin-left: 40px;
    margin-top: -50px;
}
.start{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    width: 280px;
    background: linear-gradient(90deg, #F3904F, #f5741e);
    transform: translateY(0);
    border: transparent;
    border-radius: 999px; /* pill button */
    font-size: 1.1rem;
    padding: 12px 20px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    transition: .3s;
}
.start:hover{
    cursor: pointer;
    transform: translateY(-3px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);

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
.separator{
  position: absolute;
  bottom: -1px;
  rotate: 180deg;
  left: 0;
  width: 100%;
}
/* Tuto Section */
.tuto{
  background-color: #d1ac94;
  display: grid;
  grid-template-rows: 10% 90%;
  align-items: center;
  justify-content: center;
  padding: 0 2rem;
  padding-bottom: 3rem;
}
.tuto h1{
    font-size: 3rem;
    text-align: center;
    display: flex;
    justify-content: center;
    margin-top: 1rem;
    color : #3B4371;
}
.cardContainer{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    gap: 5rem;
} 
.card{
    display: grid;
    grid-template-rows: 70% 30%;
    align-items: center;
    justify-content: center;
    box-sizing: border-box;
    width: 300px;
    height: 300px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    background-color: rgba(255, 255, 255, 0.548);
    border-radius: 30px;
    transition: 0.3s;
    overflow: hidden;

}    
.card:hover{
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
    scale: 1.05;
}    
.imgContainer1{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    background-color: #d8002821;
    width: 300px;
    transition: background-color 0.3s;
}
.imgContainer1::before {
  content: "";
  position: absolute;
  width: 150px;
  height: 150px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(243, 145, 79, 0.555), transparent);
  z-index: 0;
}
.card:hover .imgContainer1{
    background-color: #d8002857;
}
.imgContainer2{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    background-color: #736e6e34;
    width: 300px;
    transition: background-color 0.3s;
}
.card:hover .imgContainer2{
    background-color: #736e6e5d;
}
.imgContainer3{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    background-color: #65bbfc34;
    width: 300px;
    transition: background-color 0.3s;
}
.card:hover .imgContainer3{
    background-color: #65bbfc63;
}
.card img{
    width: 130px;
    height: 130px;
}
.card p{
    font-size: 1.3rem;
    text-align: center;
    color: #333;
    font-weight: 600;
    padding: 0 20px;
}


</style>
