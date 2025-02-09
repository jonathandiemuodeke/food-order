<div class="footer">
        <div class="wrapper">
            <p class="text-center">2022 all rights reserved. built by Godson</p>

        </div>
    </div>
    <script>
const bd = document.querySelector('body');
footer_fixed = document.querySelector('.footer');

const bodyHeight = bd.offsetHeight;
if (bodyHeight < 500) {
  footer_fixed.classList.add('fixed');
} else {
  footer_fixed.classList.remove('fixed');
}
    </script>
