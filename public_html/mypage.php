<?php
require_once(__DIR__ . '/../config/config.php');
?>

<?php require('./header.php') ?>

<section class='mypage'>
  <div class='mypage-wrapper'>
    <div class='landscape-image-wrapper'>
        <img src="../images/landscape.jpg" alt="">
    </div>
    <div class='my-image-wrapper'>
        <?='<img src="'.$_SESSION['user']['pictureUrl'].'">'?>
    </div>
    <div class='info-wrapper'>
      <div class='matches'>
        <h5>524</h5>
        <p>MATCHES</p>
      </div>
      <div class='wins'>
        <h5>354</h5>
        <p>WINS</p>
      </div>
      <div class='lose'>
        <h5>125</h5>
        <p>LOSES</p>
      </div>
    </div>
    <div class='description-wrapper'>
      
    </div>
  </div>
</section>


<?php require('./footer.php') ?>

<style>

.mypage {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 100px 0px 100px 0px;

}
.mypage-wrapper {
    position: relative;
    display: block;
    width: 400px;
    /* height: 450px; */
    background: #ECF0F1;
    box-shadow: 0px 2px 1px rgba(0, 0, 0, .5);
}
.landscape-image-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 225px;
    overflow: hidden;
    border-radius: 5px 5px 0px 0px;
    border-bottom: solid 8px #5CC0FF;
}
.landscape-image-wrapper img {
    width: 400px;
    
}
.my-image-wrapper {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateY(-20%) translateX(-50%);
    width: 70px;
    height:70px;
    border-radius: 50%;
    background: #2d3436;
    overflow: hidden;
    border: solid 8px #5CC0FF;
}
.my-image-wrapper img {
  width: 70px;
  
}
.info-wrapper {
  display: flex;
  justify-content: space-around;
  align-items: center;
  margin-top: 50px;
  /* height: 225px; */
  background: #ECF0F1;
  border-radius: 0px 0px 5px 5px;
}
.info-wrapper div {
  display: block;
  justify-content: space-around;
  align-items: center;
  width: 33.3333%;
}
.info-wrapper .wins {
  border-right: 1px solid #81878B;
  border-left: 1px solid #81878B;
}
.info-wrapper h5 {
  margin: 0px;
  text-transform: uppercase;
  font-size: 1.5em;
  font-family: 'Quicksand';
  font-weight: 700;
  color: #81878B;
  text-align: center;
}
.info-wrapper p {
  margin: 0px;
  text-transform: uppercase;
  font-size: 1em;
  font-family: 'Quicksand';
  font-weight: 700;
  color: #81878B;
  text-align: center;
}
.description-wrapper {

}

</style>