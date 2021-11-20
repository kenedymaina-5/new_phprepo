    <footer>
        <div class="main">
            <h2>Our Seervices</h2>
            A one stop online shop Where all </br>
            your computing needs are met </br>
            From your software needs to hadware </br>forgeting
            not repair.
        </div>
        <div class="left">
            <h3>Our Products</h3>
            <li>Hardware</li>
            <li>Software</li>
            <li>Repair</li>
        </div>
        <div class="right">
            <h3>Categories</h3>
            <li>Laptops</li>
            <li>workstations</li>
            <li>servers</li>
            <li>Phones</li>
        </div>
    </footer>
    <script>
        const navslide = () => {
            const burger = document.querySelector('.burger');
            const navi = document.querySelector('.navitems');
            const profile = document.querySelector('.tprofile');
            const navDrop = document.querySelector('.nav-drop');
            const mode = document.querySelector('.mode');
            const nav = document.querySelector('nav');

            
            burger.addEventListener('click', () => {
                navi.classList.toggle('nav-active');

                burger.classList.toggle('toggle');

            }
            )
            profile.addEventListener('click', () =>{
                navDrop.classList.toggle('profile');
            })
            mode.addEventListener('click', () => {
                nav.classList.toggle('modes');
            })


        }
        navslide();
    </script>

    
</body>


</html>
