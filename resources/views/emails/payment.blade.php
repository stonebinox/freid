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
      {{ $notification->sender->name }} just paid you <a href="{{ route('to_conversation', ['id' => $notification->conversation_id, 'n_id' => $notification->id]) }}">{{ $notification->amount }}</a>
      <br>
      The team at Freid
    </p>
  </div>
</body>
</html>