<script>

$(function(){
  "use strict";
  // ========== Form-select-option ========== //
  $(".step_1").on('click', function(){
    $(".step_1").removeClass("active");
    $(this).addClass("active");
  });
  $(".step_2").on('click', function(){
    $(".step_2").removeClass("active");
    $(this).addClass("active");
  });
  $(".step_3").on('click', function(){
    $(".step_3").removeClass("active");
    $(this).addClass("active");
  });
  $(".step_4").on('click', function(){
    $(".step_4").removeClass("active");
    $(this).addClass("active");
  });
  $(".step_5").on('click', function(){
    $(".step_5").removeClass("active");
    $(this).addClass("active");
  });

  // ================== CountDown function ================
  $('.countdown_timer').each(function(){
    $('[data-countdown]').each(function() {
      var $this = $(this), finalDate = $(this).data('countdown');
      $this.countdown(finalDate, function(event) {
        var $this = $(this).html(event.strftime(''
        + '<div class="count_hours"><h3>%H</h3><span class="text-uppercase">hrs</span></div>'
        + '<div class="count_min"><h3>%M</h3><span class="text-uppercase">min</span></div>'
        + '<div class="count_sec"><h3>%S</h3><span class="text-uppercase">sec</span></div>'));
      });
    });
  });

});

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("multisteps_form_panel");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Gönder";
  } else {
    document.getElementById("nextBtn").innerHTML = "<?=$translations['continue']?>" + ' <span><i class="fas fa-arrow-right"></i></span>';
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("multisteps_form_panel");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("wizard").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
  if(currentTab==3){
    var musteriBilgi = $('#musteriAd').val();
    $('#OzetAdSoyad').html(musteriBilgi); 

    var musteriTelefon = $('#musteriTelefon').val();
    $('#OzetTelefon').html(musteriTelefon); 

    var hizmetNe = $('#service option:selected').text();
    $('#OzetHizmetAd').html(hizmetNe); 

    var calisanKim = $('#providerAdSoyad').val();
    $('#OzetCalisanAd').html(calisanKim); 

    var tarihNe = $('#start-date').val();
    $('#OzetTarih').html(tarihNe); 

    var saatNe = $(".custom-option-item-check:checked").val();
    $('#OzetSaat').html(saatNe); 


  }

}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("multisteps_form_panel");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
      Swal.fire({
        title: "<?=$translations['error']?>",
        text: "<?=$translations['bosalan']?>",
        icon: 'error',
        confirmButtonColor: '#7367f0',
        confirmButtonText: "<?=$translations['okey']?>"

    });
    }
  }

  if(currentTab=='1' && $('#service').val() == undefined){
    Swal.fire({
      title: "<?=$translations['error']?>",
      text: "<?=$translations['pleaseservice']?>",
      icon: 'error',
      confirmButtonColor: '#7367f0',
      confirmButtonText: "<?=$translations['okey']?>"
  });
    valid = false;
  }else if(currentTab=='1' && $('#providerID').val() == ''){
    Swal.fire({
      title: "<?=$translations['error']?>",
      text: "<?=$translations['pleaseemp']?>",
      icon: 'error',
      confirmButtonColor: '#7367f0',
      confirmButtonText: "<?=$translations['okey']?>"
  });
    valid = false;
  }else if(currentTab=='2' && $('#start-date').val() == ''){
    Swal.fire({
      title: "<?=$translations['error']?>",
      text: "<?=$translations['pleaseappdate']?>",
      icon: 'error',
      confirmButtonColor: '#7367f0',
      confirmButtonText: "<?=$translations['okey']?>"
  });
    valid = false;
  } else if(currentTab=='2' && $(".custom-option-item-check:checked").val() == undefined){
    Swal.fire({
      title: "<?=$translations['error']?>",
      text: "<?=$translations['pleaseapptime']?>",
      icon: 'error',
      confirmButtonColor: '#7367f0',
      confirmButtonText: "<?=$translations['okey']?>"
  });
    valid = false;
  }
 

  
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
    
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}



$(function () {
  'use strict';

  var bsStepper = document.querySelectorAll('.bs-stepper'),
    select = $('.select2'),
    horizontalWizard = document.querySelector('.horizontal-wizard-example'),
    verticalWizard = document.querySelector('.vertical-wizard-example'),
    modernWizard = document.querySelector('.modern-wizard-example'),
    modernVerticalWizard = document.querySelector('.modern-vertical-wizard-example');

  // Adds crossed class
  if (typeof bsStepper !== undefined && bsStepper !== null) {
    for (var el = 0; el < bsStepper.length; ++el) {
      bsStepper[el].addEventListener('show.bs-stepper', function (event) {
        var index = event.detail.indexStep;
        var numberOfSteps = $(event.target).find('.step').length - 1;
        var line = $(event.target).find('.step');

        // The first for loop is for increasing the steps,
        // the second is for turning them off when going back
        // and the third with the if statement because the last line
        // can't seem to turn off when I press the first item. ¯\_(ツ)_/¯

        for (var i = 0; i < index; i++) {
          line[i].classList.add('crossed');

          for (var j = index; j < numberOfSteps; j++) {
            line[j].classList.remove('crossed');
          }
        }
        if (event.detail.to == 0) {
          for (var k = index; k < numberOfSteps; k++) {
            line[k].classList.remove('crossed');
          }
          line[0].classList.remove('crossed');
        }
      });
    }
  }

  // select2
  select.each(function () {
    var $this = $(this);
    $this.wrap('<div class="position-relative"></div>');
    $this.select2({
      placeholder: '<?=$translations['select']?>',
      width: '100%',
      dropdownParent: $this.parent()
    });
  });

  // Horizontal Wizard
  // --------------------------------------------------------------------
  if (typeof horizontalWizard !== undefined && horizontalWizard !== null) {
    var numberedStepper = new Stepper(horizontalWizard),
      $form = $(horizontalWizard).find('form');
    $form.each(function () {
      var $this = $(this);
      $this.validate({
        rules: {
          username: {
            required: true
          },
          email: {
            required: true
          },
          password: {
            required: true
          },
          'confirm-password': {
            required: true,
            equalTo: '#password'
          },
          'first-name': {
            required: true
          },
          'last-name': {
            required: true
          },
          address: {
            required: true
          },
          landmark: {
            required: true
          },
          country: {
            required: true
          },
          language: {
            required: true
          },
          twitter: {
            required: true,
            url: true
          },
          facebook: {
            required: true,
            url: true
          },
          google: {
            required: true,
            url: true
          },
          linkedin: {
            required: true,
            url: true
          }
        }
      });
    });

    $(horizontalWizard)
      .find('.btn-next')
      .each(function () {
        $(this).on('click', function (e) {
          var isValid = $(this).parent().siblings('form').valid();
          if (isValid) {
            numberedStepper.next();
          } else {
            e.preventDefault();
          }
        });
      });

    $(horizontalWizard)
      .find('.btn-prev')
      .on('click', function () {
        numberedStepper.previous();
      });

    $(horizontalWizard)
      .find('.btn-submit')
      .on('click', function () {
        var isValid = $(this).parent().siblings('form').valid();
        if (isValid) {
          alert('Submitted..!!');
        }
      });
  }

  // Vertical Wizard
  // --------------------------------------------------------------------
  if (typeof verticalWizard !== undefined && verticalWizard !== null) {
    var verticalStepper = new Stepper(verticalWizard, {
      linear: false
    });
    $(verticalWizard)
      .find('.btn-next')
      .on('click', function () {
        verticalStepper.next();
      });
    $(verticalWizard)
      .find('.btn-prev')
      .on('click', function () {
        verticalStepper.previous();
      });

    $(verticalWizard)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }

  // Modern Wizard
  // --------------------------------------------------------------------
  if (typeof modernWizard !== undefined && modernWizard !== null) {
    var modernStepper = new Stepper(modernWizard, {
      linear: false
    });
    $(modernWizard)
      .find('.btn-next')
      .on('click', function () {
        modernStepper.next();
      });
    $(modernWizard)
      .find('.btn-prev')
      .on('click', function () {
        modernStepper.previous();
      });

    $(modernWizard)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }

  // Modern Vertical Wizard
  // --------------------------------------------------------------------
  if (typeof modernVerticalWizard !== undefined && modernVerticalWizard !== null) {
    var modernVerticalStepper = new Stepper(modernVerticalWizard, {
      linear: false
    });
    $(modernVerticalWizard)
      .find('.btn-next')
      .on('click', function () {
        modernVerticalStepper.next();
      });
    $(modernVerticalWizard)
      .find('.btn-prev')
      .on('click', function () {
        modernVerticalStepper.previous();
      });

    $(modernVerticalWizard)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }
});

</script>