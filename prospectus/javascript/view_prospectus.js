document.getElementById('universities').addEventListener('change', function() {
    var selectedValue = this.value;
    var actionButton = document.getElementById('action-button');

    if (selectedValue) {
        actionButton.style.display = 'block';
        actionButton.onclick = function() {
            var url = '';
            switch(selectedValue) {
                case 'uct':
                    url = 'https://uct.ac.za/sites/default/files/media/documents/uct_ac_za/49/ug-prospectus-2026.pdf';
                    break;
                case 'wits':
                    url = 'https://www.wits.ac.za/media/wits-university/study/schools-liason/documents/Wits%20SLO%20Grade%2012_100125.pdf';
                    break;
                case 'stelle':
                    url = 'https://www.sun.ac.za/english/maties/Documents/Prospectus.pdf';
                    break;
                case 'up':
                    url = 'https://www.up.ac.za/media/shared/368/Faculty%20Brochures/2026/up_fb-ems-2026_devv6_web.zp260329.pdf';
                    break;
                case 'ukzn':
                    url = 'https://saa.ukzn.ac.za/wp-content/uploads/2024/08/Undergrad2025-Web-latest.pdf';
                    break;
                case 'uj':
                    url = 'https://assets.apply.org.za/u-files/Prospectuses/UJ2026.pdf';
                    break;
                case 'rhodes':
                    url = 'https://assets.apply.org.za/u-files/Prospectuses/RU2024.pdf';
                    break;
                case 'uwc':
                    url = 'https://assets.apply.org.za/u-files/Prospectuses/UWC2025.pdf';
                    break;
                case 'ufs':
                    url = 'https://www.ufs.ac.za/docs/librariesprovider44/study-at-the-ufs/2026-ufs-prospectus.pdf?sfvrsn=dd6a1720_1';
                    break;
                case 'fort':
                    url = 'https://media.portmoni.com/56497/Study-Guide-2025.pdf';
                    break;
                case 'limpopo':
                    url = 'https://assets.apply.org.za/u-files/Prospectuses/UL2025.pdf';
                    break;
                case 'nwu':
                    url = 'https://studies.nwu.ac.za/sites/studies.nwu.ac.za/files/files/undergrad/2025-Grade-12-Prospectus.pdf';
                    break;
                case 'venda':
                    url = 'https://www.univen.ac.za/wp-content/uploads/2024/05/2025_-Undergraduate-Student-Information-Brochure-corrected.pdf';
                    break;
                case 'zululand':
                    url = 'https://www.unizulu.ac.za/wp-content/uploads/2025/02/2026-Brochure-for-undergraduate.pdf';
                    break;
                case 'mp':
                    url = 'https://media.portmoni.com/56497/Undergraduate-Programmes.pdf';
                    break;
                case 'sol':
                    url = 'https://media.portmoni.com/56497/SPU-2025-UG-Prospectus.pdf';
                    break;
                case 'sefako':
                    url = 'https://assets.apply.org.za/u-files/Prospectuses/SMU2025.pdf';
                    break;
                case 'cput':
                    url = 'https://media.portmoni.com/56497/A4-PROSPECTUS-2026-1124-WEB.pdf';
                    break;
                case 'dut':
                    url = 'https://www.dut.ac.za/wp-content/uploads/prospective_and_current_students/entry_requirements.pdf';
                    break;
                case 'tut':
                    url = 'https://tut.ac.za/images/docs/study/2026General-Information-First-Year-Enrolment.pdf';
                    break;
                case 'vut':
                    url = 'https://assets.apply.org.za/u-files/Prospectuses/VUT2025.pdf';
                    break;
                case 'cut':
                    url = 'https://assets.apply.org.za/u-files/Prospectuses/CUT2023.pdf';
                    break;
                case 'mut':
                    url = 'https://www.mut.ac.za/wp-content/uploads/2023/09/Undergraduate-Prospectus.pdf';
                    break;
                // Add more cases as needed
            }
            if (url) {
                window.location.href = url;
            }
        };
    } else {
        actionButton.style.display = 'none';
    }
});