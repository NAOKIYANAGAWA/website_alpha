<?php
require_once(__DIR__ . '/../config/config.php');
$postEvent = new \app\controller\PostEvent();
$postEvent->startProccess();
?>

<?php require('./header.php') ?>

<section class='add-event'> 

    <div class='add-event-wrapper'>
        <div class='add-event-inner'>
            <form action="" method='post'>
                <input type="date" name='match[date]'>
                <input type="text" name='match[place]' placeholder='場所'>
                <input type="text" name='match[level]' placeholder='レベル'>
                <button type='submit'>作成</i></button>
            </form>
        </div>
    </div>
    

</section>
    
<?php require('./footer.php') ?>


<style>
.add-event-wrapper {
    width: 90%;
    height: 100%;
    margin: 50px auto;
    background: rgba(0,0,0,0.3);
}
.add-event-inner {
    padding: 50px;
}
.add-event-inner form {
    display: block;
    max-width: 300px;
}
.add-event-inner input {
    width: 300px;
    margin-top: 20px;
    border: 0px;
    border-bottom: 3px solid #fff;
    background: rgba(0,0,0,0);
    outline: none;
}
.add-event-inner button {
    width: 60px;
    height: 30px;
    margin-top: 20px;
    border: 0px;
    background: #81ecec;
    outline: none;
    border-radius: 20px;
}
.add-event-inner button:hover {
    opacity: .5;
}


</style>