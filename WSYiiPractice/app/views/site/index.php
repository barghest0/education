<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>


<div class="site-index">

    <div class="jumbotron text-center bg-transparent">

        <p id="counter">Счетчика скоро обновится</p>
        <button>Разрешить звуковые уведомления</button>
    </div>

    <div class="body-content">

    <?php
    foreach ($problems as $problem) {
        echo '
        <div class="row">
        <div class="col-lg-4">
            <h2>' . $problem->name . '</h2>
            <p>' . $problem->description . '</p>
            <img class="img-responsive" style="width:300px;height:300px" src="uploads/' . $problem->photo_after . '" data-before="../uploads/' . $problem->photo_before . '" data-after="../uploads/' . $problem->photo_after . '" onMouseOver="hover(this)" onMouseOut="back(this)"  >
           
        </div>
        ';
    }
    ?>

    </div>

<script>
    let i = 0
    function hover(e) {      
        e.src = e.dataset.before
    }
    function back(e) {
        
        e.src = e.dataset.after
    }
    function updateCounter(){
        $.ajax({
            type:'GET',
            url:'<?= Url::toRoute('/site/counter') ?>',
            dataType:'text',
            success:function(response){
                if (i!=response) {
                    let a = new Audio('')
                    a.play
                    i = response
                }
                $('#counter').html(`Решено заявок ${response}`)
            }
        })
    }

    setInterval(updateCounter,3000)
</script>

