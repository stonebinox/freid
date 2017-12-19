<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="utf-8">
</head>
<body>
  <div class="w3-container">
    <p>
      Hi {{ $notification->receiver->name }},
      <br>
      You have a new message on Freid. <a href="{{ route('to_conversation', ['id' => $notification->conversation_id, 'n_id' => $notification->id]) }}">Click here</a> to view it and respond.
      <br>
      The team at Freid
    </p>
  </div>
</body>
</html>