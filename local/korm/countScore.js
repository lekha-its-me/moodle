/**
 * Created by lekha on 28.02.17.
 */
function countScore($){

  if(!(face = parseInt(document.getElementById("face").value))){
    face = 0;
  };
  if(!(presentation = parseInt(document.getElementById("presentation").value))){
    presentation = 0;
  };
  if(!(hitechnic = parseInt(document.getElementById("hitechnic").value))){
    hitechnic = 0;
  };
  if(!(documents = parseInt(document.getElementById("documents").value))){
    documents = 0;
  };
  if(!(tmc = parseInt(document.getElementById("tmc").value))){
    tmc = 0;
  };

  var totalScore = face + presentation + hitechnic + documents + tmc;
  totalScore = parseInt(totalScore);
  document.getElementById("id_total_score").value = totalScore;
  document.getElementById("countTotalScore").value = totalScore;


};