<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Modal with Save and Close</title>
  </head>
  <body>

    <!-- Button to trigger modal -->
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Open Modal</button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal with Save and Close</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <form id="myForm">
              <!-- Your form content here -->
              <div class="mb-3">
                <label for="exampleInputText" class="form-label">Text Input</label>
                <input type="text" class="form-control" id="exampleInputText" placeholder="Enter text">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Email Input</label>
                <input type="email" class="form-control" id="exampleInputEmail" placeholder="Enter email">
              </div>
            </form>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="saveButton">Save</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
      // JavaScript function to handle "Save" button click
      document.getElementById('saveButton').addEventListener('click', function () {
        // You can add your save logic here, for example:
        const inputText = document.getElementById('exampleInputText').value;
        const inputEmail = document.getElementById('exampleInputEmail').value;
        alert(`Saved! Text: ${inputText}, Email: ${inputEmail}`);
        // Close the modal after saving
        $('#exampleModal').modal('hide');
      });
    </script>

  </body>
</html>
