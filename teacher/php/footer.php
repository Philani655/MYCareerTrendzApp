<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

    footer {
        font-family: "Montserrat", sans-serif;
    }

</style>

<?php
$currentYear = date("Y");
$nextYear = $currentYear + 1;
$yearRange = $currentYear . '-' . $nextYear;
?>
<footer class="main-footer">
    <center>
        <center>
            <footer>
                <img src="../../images/footer.jpg" alt="portfolio">                
            </footer>
        </center>
            <small>Copyright &copy; <?php echo $yearRange;?> <strong>MYCareerTrendz.</strong> All rights reserved.</small>
    </center>
</footer>