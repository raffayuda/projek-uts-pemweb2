// Navbar scroll effect
const header = document.querySelector('header');

if (header) {
  // Add transparent class initially
  header.classList.add('nav-transparent');
  
  // Detect scroll position and update navbar
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      header.classList.remove('nav-transparent');
      header.classList.add('nav-scrolled');
    } else {
      header.classList.add('nav-transparent');
      header.classList.remove('nav-scrolled');
    }
  });
}

// Form steps functionality
const nextButtons = document.querySelectorAll('.next-step');
const prevButtons = document.querySelectorAll('.prev-step');
const formSteps = document.querySelectorAll('.form-step');
const progressSteps = document.querySelectorAll('.progress-step');

let currentStep = 0;

const updateFormSteps = () => {
  formSteps.forEach((step, index) => {
    if (index === currentStep) {
      step.classList.remove('hidden');
    } else {
      step.classList.add('hidden');
    }
  });
};

const updateProgressBar = () => {
  // Update progress steps (circles)
  progressSteps.forEach((step, index) => {
    if (index <= currentStep) {
      step.classList.add('active');
      // Add gradient background to active steps
      step.style.background = 'linear-gradient(to right, #9333ea, #3b82f6)';
    } else {
      step.classList.remove('active');
      // Reset background for inactive steps
      step.style.background = '#374151'; // bg-gray-700
    }
  });
  
  // Update progress bar width
  const progressBars = document.querySelectorAll('.flex-1.h-1.bg-gray-700 .h-full');
  progressBars.forEach((bar, index) => {
    // Add transition for smooth animation
    bar.style.transition = 'width 0.5s ease-in-out';
    
    if (index < currentStep) {
      // Set completed bars to 100%
      bar.style.width = '100%';
    } else if (index === currentStep - 1 && currentStep > 0) {
      // Set current bar to 100%
      bar.style.width = '100%';
    } else {
      // Set upcoming bars to 0%
      bar.style.width = '0%';
    }
  });
};

nextButtons.forEach(button => {
  button.addEventListener('click', () => {
    if (currentStep < formSteps.length - 1) {
      currentStep++;
      updateFormSteps();
      updateProgressBar();
    }
  });
});

prevButtons.forEach(button => {
  button.addEventListener('click', () => {
    if (currentStep > 0) {
      currentStep--;
      updateFormSteps();
      updateProgressBar();
    }
  });
});

// Vehicle selection functionality
const vehicleCards = document.querySelectorAll('.vehicle-card');

vehicleCards.forEach(card => {
  card.addEventListener('click', () => {
    vehicleCards.forEach(c => c.classList.remove('selected'));
    card.classList.add('selected');
  });
});

// Initialize the form
updateFormSteps();
updateProgressBar();

// Mobile menu toggle
const mobileMenuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');

if (mobileMenuButton && mobileMenu) {
  mobileMenuButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
}