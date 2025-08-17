<script setup></script>

<template>
    <div class="heroSec ">
        <div class="header">
            <img src="/Resources/images/logo.png" alt="" class="logo">
        </div>
        <div class="content">
            <div class="text">
            <h1 class = "sansation-bold" >Échangez vos compétences, pas votre argent 🚀</h1>
            <p class="sansation-regular">Donnez une heure de votre savoir, gagnez une heure d’apprentissage dans un autre domaine.</p>
            <button class="start">
                <p class="sansation-bold">Commencer gratuitement</p>
                <img src="/Resources/icons/fleche-cercle-droite.png" alt="">
            </button>
        </div>
        <img src="/Resources/images/heroSecImage.png" alt="" class="heroSecImage">
        </div>
    </div>
</template>

<style scoped>
    .header{
        display: flex;
        justify-content: start;
        align-items: center;
    }
    .logo{
        height: 110%;
        width: 130px;
        margin-top: 20px;
    }
    .heroSec{
        background-image: linear-gradient( 174.2deg,  rgba(255,244,228,1) 7.1%, rgba(240,246,238,1) 67.4% );        height: 100vh;
        width: 100vw;
        display: grid;
        grid-template-rows: 12% 1fr;
        padding: 0 2% 3% 5%;
    }
    .content{
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: center;
        justify-items: center;
    }
    .text{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
    }
    .text h1{
        font-size: 3rem;
        text-align: center;
        font-weight: 700;
        margin-bottom: 1rem;
    }
    .text p{
        font-size: 1rem;
        margin-bottom: 2rem;
        text-align: center;
    }
    .heroSecImage{
        height: 520px;
        width: 520px;
        margin-left: 80px;
        margin-top: -10px;
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
</style>