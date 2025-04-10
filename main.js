




    function navigateTo(url) {
        window.location.href = url;
    }



    //footer
    let scrollTopBtn = document.getElementById("scrollTopBtn");

    window.onscroll = function() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            scrollTopBtn.style.display = "block";
        } else {
            scrollTopBtn.style.display = "none";
        }
    };

    function scrollToTop() {
        window.scrollTo({top: 0, behavior: "smooth"});
    }

    //trademark
    function showSection(sectionId) {
        document.querySelectorAll('.content-section').forEach(section => {
            section.classList.remove('active-section');
        });
        document.getElementById(sectionId).classList.add('active-section');
    }

    //php 
 
        $('#contactForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: 'contact.php', // Make sure your PHP file is named contact.php
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    $('#formMessage')
                        .text(response.message)
                        .css('color', response.status === 'success' ? 'green' : 'red');
                    if (response.status === 'success') {
                        $('#contactForm')[0].reset();
                    }
                },
                error: function() {
                    $('#formMessage')
                        .text('Something went wrong. Please try again later.')
                        .css('color', 'red');
                }
            });
        });
     



      