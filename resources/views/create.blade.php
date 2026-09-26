<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note App</title>
    <link rel="stylesheet" href="{{asset('style.css')}}">
</head>

<body>
    <div class="container">
        <h1>New Notes</h1>
        <div id="notes-container"></div>
        <form method="POST" action="{{route('notes.store')}}">
            @csrf
            <div id="add-note">
                <textarea id="note-text" placeholder="Write your note here..." rows="5" name="note"></textarea>
                <button id="add-btn">Add Note</button>
            </div>
        </form>
    </div>

    <script src="script.js"></script>
</body>

</html>