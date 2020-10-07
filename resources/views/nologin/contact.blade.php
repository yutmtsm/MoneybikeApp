        <p>名前：{{ $data['contact_name'] }}さん</p>
        <p>メールアドレス：{{ $data['contact_email'] }}</p>
        <p>---以下メッセージが送信されました---</p>
        <p>{!! nl2br( $data['contact_item'] ) !!}</p>
        <p>{!! nl2br( $data['contact_message'] ) !!}</p>
