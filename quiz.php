<?php 
include('header-quiz.php');
?>
<div class="col-4 mx-auto">
    <ul class="nav nav-pills nav-height justify-content-between mb-3 horizontal-line position-relative" id="pills-tab" role="tablist">

        <div class="w-100 border border-1 border-white z-index-line position-absolute top-50 start-50 translate-middle"></div>
        <?php


        $i=0;
            foreach( $remainingQuest as $key => $question){
                if( $i == 0 ){
                    echo "<input type='hidden' id='firstQuestion' value='$key'>";
                    echo "<input type='hidden' id='remainingQuestion' value='".count( $remainingQuest )."'>";

                    $sql = "
                        UPDATE choice 
                        SET enterwhen = CURRENT_TIMESTAMP()
                        WHERE id_user = $_SESSION[id_user] and id_question = $key 
                    ";
                    $result = $conn->query($sql);
                }
                $i++;

        ?>
        <li class="nav-item" role="presentation">
            <input class="medium" type="radio" name="tab-dots" id="<?php echo $key; ?>" value="<?php echo $key; ?>" data-bs-toggle="pill" data-bs-target="#question-<?php echo $key; ?>" role="tab" aria-controls="question-<?php echo $key; ?>" aria-selected="false" style="pointer-events: none;"/>
        </li>
        <?php 
            }
        ?>
    </ul>
</div>
<div class="mx-4">
    <div class="tab-content" id="pills-tabContent">
        <?php 
            foreach( $remainingQuest as $key => $question){
        ?>
        <div class="tab-pane fade" id="question-<?php echo $key ?>" role="tabpanel" value="<?php echo $key ?>" tabindex="0">
            <p class="mb-3">
                <?php
                    echo $question['text'];
                ?>
            </p>
            <div class="d-grid gap-2 mb-3">
                <?php
                    foreach( $question['answer'] as $answer ){
                ?>
                <input type="radio" class="btn-check btn-choose" name="options-<?php echo $answer['id_questions'] ?>" id="<?php echo $question['id_questions'].'.'.$answer['id_answer'] ?>" autocomplete="off">
                <label class="btn btn-light rounded-pill my-1 text-start labelRisposte " for="<?php echo $question['id_questions'].'.'.$answer['id_answer'] ?>"><?php echo $answer['text'] ?></label>
                <?php
                    }
                 ?>
            </div>
        </div>
        <?php 
            }
        ?>
    </div>
</div>
<div class="mx-4 mb-4 mt-1">
    <button id="submit-answer" type="button" class="btn btn-outline-light rounded-pill w-100" disabled>Conferma</button>
</div>

<?php include 'footer.php' ?>