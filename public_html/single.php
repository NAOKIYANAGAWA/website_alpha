<?php
require_once(__DIR__ . '/../config/config.php');
$postEvent = new \app\controller\PostEvent();
$postEvent->startProccess();
print_r($_SESSION['user']);
?>

<?php require('./header.php') ?>
    <div class='crate-match'>
        <form action="" method='post'>
            <input type="date" name='match[date]'>
            <input type="text" name='match[place]'>
            <input type="text" name='match[level]'>
            <button type='submit'><i class="fas fa-search"></i></button>
        </form>
    </div>
    
<?php require('./footer.php') ?>