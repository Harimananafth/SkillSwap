<script setup>
import { ref, onMounted } from 'vue'
import { comments, messages, advantages } from '../../public/Resources/Texts/landing'

// Reactive variable to hold the displayed text
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
    }, {threshold: 0.3});
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
    const avantageItem = document.querySelectorAll('.avantageItem');
    avantageItem.forEach(element => {
        observer.observe(element)
    }); 
    
})
</script>

<template>

  <!--Hero section-->


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
    <svg class="separatorUp" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="currentColor" fill-opacity="1"
        d="M0,128L48,133.3C96,139,192,149,288,138.7C384,128,480,96,576,85.3C672,75,768,85,864,101.3C960,117,1056,139,1152,133.3C1248,128,1344,96,1392,80L1440,64L1440,0L0,0Z"></path>
    </svg>

  </section>
  
  <!--Tuto section-->

  <section class="tuto">
  <h1 class="sansation-bold scale"> Comment ça marche ?</h1>
  <div class="cardContainer">
    <div class="card leftEntry">
      <div class="stepNumber sansation-regular">01</div>
      <div class="imgContainer halo halo1">
        <img src="/Resources/icons/guitare.png" alt="" class="cardImg">
      </div>
      <div class="textContainer">
        <h2 class="sansation-bold">Proposez vos compétences</h2>
        <p class="sansation-regular">Partagez ce que vous savez faire avec la communauté.</p>
      </div>
    </div>

    <div class="card scale">
      <div class="stepNumber sansation-regular">02</div>
      <div class="imgContainer halo halo2">
        <img src="/Resources/icons/programmation.png" alt="" class="cardImg">
      </div>
      <div class="textContainer">
        <h2 class="sansation-bold">Trouvez ce dont vous avez besoin</h2>
        <p class="sansation-regular">Accédez facilement aux compétences offertes par d’autres.</p>
      </div>
    </div>

    <div class="card rightEntry">
      <div class="stepNumber sansation-regular">03</div>
      <div class="imgContainer halo halo3">
        <img src="/Resources/icons/echange.png" alt="" class="cardImg">
      </div>
      <div class="textContainer">
        <h2 class="sansation-bold">Échangez via un système de crédits</h2>
        <p class="sansation-regular">Une heure donnée = une heure gagnée dans un autre domaine.</p>
      </div>
    </div>
  </div>
</section>

<!--Avantage + témoignage section-->

<section class="avantage">


  <svg class="separatorDown" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="currentColor" fill-opacity="1"
      d="M0,128L48,133.3C96,139,192,149,288,138.7C384,128,480,96,576,85.3C672,75,768,85,864,101.3C960,117,1056,139,1152,133.3C1248,128,1344,96,1392,80L1440,64L1440,0L0,0Z"></path>
  </svg>


  <div class="avText">
    <h1 class="avTitle scale sansation-bold">Pourquoi choisir SkillSwap ?</h1>

    <div class="avList">
      <span v-for="(adv, index) in advantages" :key="index" :class=" index % 2 === 0 ? 'avantageItem leftEntry sansation-regular' : 'avantageItem rightEntry sansation-regular'">
        {{ adv.text }}
      </span>
    </div>

  </div>




  <div class="marquee-container scale">
    <div class="marquee-content">
      <div
        v-for="(comment, index) in comments"
        :key="'c1-' + index"
        class="comment-card"
      >
        <img :src="comment.avatar" alt="avatar" class="avatar" />
        <div class="info">
          <h2 class="name sansation-bold">{{ comment.name }}</h2>
          <p class="text sansation-regular">{{ comment.text }}</p>
        </div>
      </div>

      <div
        v-for="(comment, index) in comments"
        :key="'c2-' + index"
        class="comment-card"
      >
        <img :src="comment.avatar" alt="avatar" class="avatar" />
        <div class="info">
          <h2 class="name sansation-bold">{{ comment.name }}</h2>
          <p class="text sansation-regular">{{ comment.text }}</p>
        </div>
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
    scale: 0.5;
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);

}
.upEntry.in-view{
    opacity: 1;
    scale: 1;
}
.leftEntry{
    opacity: 0;
    transform: translateX(-100%);
    transition: all 1s cubic-bezier(0.4, 0, 0.2, 1);

}
.leftEntry.in-view{
    opacity: 1;
    transform: translateX(0);
}
.rightEntry{
    opacity: 0;
    transform: translateX(100%);
    transition: all 1.5s cubic-bezier(0.4, 0, 0.2, 1);

}
.rightEntry.in-view{
    opacity: 1;
    transform: translateX(0);
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
  margin-top: -50px;


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
    border-radius: 999px;
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
.separatorUp{
  position: absolute;
  left: 0;
  bottom: -1px;
  width: 100%;
  rotate: 180deg;   
   color: var(--tuto-solid-top);
}

/* Tuto Section */
.tuto {
  background: linear-gradient(to bottom, var(--tuto-solid-top), var(--tuto-bottom));
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 4rem 2rem;
  text-align: center;
  gap: 5rem;
  padding-bottom: 0;
  box-sizing: border-box;
}

.tuto h1 {
  font-size: 3rem;
  margin-bottom: 3rem;
  color: #3B4371;
}


.cardContainer {
  display: flex;
  gap: 3rem;
  flex-wrap: wrap;
  justify-content: center;
}

.card {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 320px;
  padding: 2rem 1.5rem;
  border-radius: 25px;
  background: white;
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  gap: 1rem;
}

.card:hover {
  transform: translateY(-10px) scale(1.03);
  box-shadow: 0 6px 16px rgba(0,0,0,0.25);
}


.stepNumber {
  position: absolute;
  top: -20px;
  left: -20px;
  background: #3B4371;
  color: white;
  font-weight: bold;
  font-size: 1.2rem;
  padding: 0.5rem 1rem;
  border-radius: 12px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}


.imgContainer {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 1.5rem;
}

.halo::before {
  content: "";
  position: absolute;
  width: 160px;
  height: 160px;
  border-radius: 50%;
  filter: blur(40px);
  z-index: 0;
}

.halo1::before { background: radial-gradient(circle, #ff6b6b66, transparent); }
.halo2::before { background: radial-gradient(circle, #4dabf766, transparent); }
.halo3::before { background: radial-gradient(circle, #f39c1266, transparent); }

.cardImg {
  width: 100px;
  height: 100px;
  position: relative;
  z-index: 1;
}

/* Texts inside cards */


.textContainer h2 {
  font-size: 1.4rem;
  margin-bottom: 0.5rem;
  color: #3B4371;
}

.textContainer p {
  font-size: 1rem;
  color: #555;
  line-height: 1.4;
}

/* Responsive */
@media (max-width: 900px) {
  .cardContainer {
    flex-direction: column;
    gap: 2rem;
  }
}


/* Avantage + Témoignage Section */


.avantage {
  position: relative;
  padding-top: 9%;
  background-color: #aeb3d0;
  background-image: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%233b4b71' fill-opacity='0.08'%3E%3Cpath d='M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10zm10 8c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm40 40c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  display: grid;
  grid-template-rows: 90% 10%;
}
.separatorDown{
  position: absolute;
  left: 0;
  width: 100%; 
  top: 0;
   color: var(--tuto-bottom);
}
.avText {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 3rem;
  padding: 4rem 2rem;
  color: #3B4371;
}

.avTitle {
  font-size: 3rem;
  font-weight: 800;
  text-align: center;
  line-height: 1.2;
}

.avList {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 1.5rem 2rem;
  font-size: 1.2rem;
  font-weight: 500;
  color: #555;
}

.avList span {
font-size: 1.3rem;
  transition: transform 0.3s, color 0.3s;
}

.avList span:hover {
  color: #F3904F;
  transform: scale(1.1);
}


.marquee-container {
  overflow: hidden;
  width: 100%;
  padding: 20px 0;
  z-index: 20;
}

.marquee-content {
  display: flex;
  width: max-content;
  animation: marquee 20s linear infinite;
}
.marquee-content:hover {
  animation-play-state: paused;
}

.comment-card {
  display: flex;
  align-items: center;
  justify-content: start;
  background-color: whitesmoke;
  border-radius: 15px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  padding: 10px 15px;
  margin: 0 10px;
  min-width: 250px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.comment-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 12px #f5741e5d;
}


.avatar {
  width: 55px;
  height: 55px;
  border-radius: 50%;
  margin-right: 18px;
}


.info {
  display: flex;
  flex-direction: column;
  gap: 10px;
  height: 100%;
  padding-top: 10px;
}
.name {
  margin: 0;
  color: #3B4371;
}
.text {
  margin: 0;
  color: black;
}

/* Animation infini */
@keyframes marquee {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-50%);
  }
}
</style>