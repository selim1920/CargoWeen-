let currentStep = 1;
const form = document.getElementById("multi-step-form");
const formSteps = document.querySelectorAll(".form-step");

function showStep(step) {
  formSteps.forEach((formStep) => {
    formStep.style.display = "none";
  });
  formSteps[step - 1].style.display = "block";
}

function nextStep(step) {
  if (step < formSteps.length) {
    currentStep = step + 1;
    showStep(currentStep);
  } else {
    form.submit();
  }
}

function prevStep(step) {
  if (step > 1) {
    currentStep = step - 1;
    showStep(currentStep);
  }
}

showStep(currentStep);