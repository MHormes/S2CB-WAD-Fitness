function ConfirmDelete($woName){
    if(confirm("Are you sure you want to delete this page?")){
        AjaxCallToRemoveWorkout($woName);
        window.location.replace("../php pages/workoutPage.php");
    }else{
        return false;
    }
}

function AjaxCallToRemoveWorkout($woName){
    $.ajax({
        type: "post",
        url: "../includes/workout_template.php",
        data: {
          workoutName: $woName,
          actionToPerform: "Delete",
        },
        success: function (result) {
          console.log(result);
        },
      });
}

function CreateNewWorkout() {
    var selectedExercise = [];
    const checkedboxes = document.querySelectorAll(
      'input[name="exercise"]:checked'
    );
    checkedboxes.forEach((checkbox) => {
      selectedExercise.push(checkbox.id);
    });
    ajaxFunctionForCreation(selectedExercise);
  }
  
  function ajaxFunctionForCreation(exerciseArray) {
    $.ajax({
      type: "post",
      url: "../includes/workout_template.php",
      data: {
        workoutName: $("[id$='woName']").val(),
        muscleTrained: $("[id$='muscleTrained']").val(),
        selectedExcerciseArray: exerciseArray,
        actionToPerform: "createOrUpdate",
      },
      success: function (result) {
        console.log(result);
      },
    });
  }