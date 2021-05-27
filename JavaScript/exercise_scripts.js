function ConfirmDeleteExercise($exName, $catName){
    if(confirm("Are you sure you want to delete this exercise?")){
        AjaxCallToRemoveExercise($exName);
        window.location.replace("../php pages/selectedCategorie.php?catName=" + $catName);
    }else{
        return false;
    }
}

function AjaxCallToRemoveExercise($exName){
    $.ajax({
        type: "post",
        url: "../includes/exercise_template.php",
        data: {
          exerciseName: $exName,
          actionToPerform: "Delete",
        },
        success: function (result) {
          console.log(result);
        },
      });
}