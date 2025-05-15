
<div class="container">

    <div id="qrcode">
        <img src="../qrcode/test-qr-code.png" alt="QR-Code-Generator">
    </div>

    <div class="progress-group" style="color: green; margin-top: 20px;">
        <div class="mb-3">
            <label for="qrCode" class="form-label">Your QR Code is ready to be downloaded.</label>
            <button id="download-btn" class="btn btn-success form-control" style="width: 10%; display: block;">Download</button>
        </div>
    </div>

    <br><br>
    <section>
        <h4 class="box-title">Customize QR Code</h4>
        <form action="#" id="qrcode-settings">

            <div class="progress-group" style="margin-bottom: 20px;">
                <div class="mb-3">
                    <label for="qrcodeText" class="form-label">Enter Your Text/website link</label>
                    <textarea id="qrcodeText" name="text" class="form-control" style="width: 30%;">https://mycareertrendz.co.za/</textarea>
                </div>
            </div>

            <div class="progress-group" style="margin-bottom: 20px;">
                <div class="mb-3">
                    <label for="bgColor" class="form-label">Background Color</label>
                    <input type="color" id="bgColor" class="form-control" name="bgColor" value="#ffffff" style="width: 5%;">
                </div>
            </div>

            <div class="progress-group" style="margin-bottom: 20px;">
                <div class="mb-3">
                    <label for="txtColor" class="form-label">Text Color</label>
                    <input type="color" id="txtColor" class="form-control" name="txtColor" value="#000000" style="width: 5%;">
                </div>
            </div>

            <div class="progress-group" style="margin-bottom: 20px;">
                <div class="mb-3">
                    <label for="qrcodeWidth" class="form-label">QR Code Width and Height</label>
                    <input type="number" id="qrcodeWidth" class="form-control" name="qrcodeWidth" value="256" style="width: 10%;">
                </div>
            </div>

            <div class="progress-group" style="margin-bottom: 20px;">
                <div class="mb-3">
                    <label for="customLogo" class="form-label">Your Logo</label>
                    <input type="file" id="customLogo" class="form-control" name="customLogo" style="width: 20%;">
                </div>
            </div>

            <div class="progress-group" style="margin-bottom: 20px;">
                <div class="mb-3">
                    <label for="logoWidth" class="form-label">Logo Width and Height</label>
                    <input type="number" id="logoWidth" class="form-control" name="logoWidth" value="70" style="width: 10%;">
                </div>
            </div>

            <div class="progress-group" style="margin-bottom: 20px;">
                <div class="mb-3">
                    <label for="isTransparent" class="form-label">Logo Transparent:</label>
                    <input type="checkbox" id="isTransparent" class="form-control" name="isTransparent" value="70" style="width: 5%;">
                </div>
            </div>

            <p class="info">
                If Checked, the logo background color will not have any effect.
            </p>

            <div class="progress-group" style="margin-bottom: 20px;">
                <div class="mb-3">
                    <label for="isTransparent" class="form-label">Logo Background:</label>
                    <input type="color" id="logoBg" class="form-control" name="logoBg" value="70" style="width: 5%;">
                </div>
            </div>

            <div class="progress-group" style="margin-bottom: 20px;">
                <div class="mb-3">
                    <button id="generate-btn" type="submit" class="btn btn-primary form-control" style="width: 20%;">Generate</button>
                </div>
            </div>

        </form>
    </section>
</div>
