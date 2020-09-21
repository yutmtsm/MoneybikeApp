@extends('layouts.common.common')
@section('css', 'mypage.css')

@section('title', '新規バイク追加')

@section('content')
<div class="container">
    <h1>バイク編集</h1>
    <div class="row" style="width: 100%;">
        <div class="col-md-6 mx-auto" >
            <form action="{{ action('Admin\BikeController@update') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <!-- メーカー -->
                <div class="form-group">
                    <label class="control-label">メーカー</label>
                    <select name="manufacturer" class="form-control">
                        <option value="{{ $mybike_form->manufacturer }}">{{ $mybike_form->manufacturer }}</option>
                        <option value="ホンダ">ホンダ</option>
                        <option value="ヤマハ">ヤマハ</option>
                        <option value="スズキ">スズキ</option>
                        <option value="カワサキ">カワサキ</option>
                        <option value="ダイハツ">ダイハツ</option>
                        <option value="メグロ">メグロ</option>
                        <option value="ヨシムラ">ヨシムラ</option>
                        <option value="ロデオ">ロデオ</option>
                        <option value="山口">山口</option>
                        <option value="新三菱重工">新三菱重工</option>
                        <option value="富士重工">富士重工</option>
                        <option value="陸王">陸王</option>
                        <option value="トヨモーター">トヨモーター</option>
                        <option value="トーハツ">トーハツ</option>
                        <option value="ブリヂストン">ブリヂストン</option>
                        <option value="モリワキ">モリワキ</option>
                        <option value="プロト">プロト</option>
                        <option value="ＯＶＥＲｃｒｅａｔｉｖｅ">ＯＶＥＲｃｒｅａｔｉｖｅ</option>
                        <option value="ＳＮＡＫＥ　ＭＯＴＯＲ">ＳＮＡＫＥ　ＭＯＴＯＲＳ</option>
                        <option value="Ｍｉｎｉｒｏａｄ">Ｍｉｎｉｒｏａｄ</option>
                        <option value="ＸＥＡＭ">ＸＥＡＭ</option>
                        <option value="ブレイズ">ブレイズ</option>
                        <option value="ハーレーダビッドソン">ハーレーダビッドソン</option>
                        <option value="ビューエル">ビューエル</option>
                        <option value="タイタン">タイタン</option>
                        <option value="ボス　ホ">ボス　ホス</option>
                        <option value="インディアン">インディアン</option>
                        <option value="クリーブランド">クリーブランド</option>
                        <option value="ヴィクトリー">ヴィクトリー</option>
                        <option value="ＢＭＷ">ＢＭＷ</option>
                        <option value="ザックス">ザックス</option>
                        <option value="エムゼット">エムゼット</option>
                        <option value="トライアンフ">トライアンフ</option>
                        <option value="ビーエスエー">ビーエスエー</option>
                        <option value="ノートン">ノートン</option>
                        <option value="Ｍｅｇｅｌｌｉ">Ｍｅｇｅｌｌｉ</option>
                        <option value="マット">マット</option>
                        <option value="ＡＪＳ">ＡＪＳ</option>
                        <option value="ドゥカティ">ドゥカティ</option>
                        <option value="モトグッツイ">モトグッツイ</option>
                        <option value="アプリリア">アプリリア</option>
                        <option value="イタルジェット">イタルジェット</option>
                        <option value="カジバ">カジバ</option>
                        <option value="ピアジオ">ピアジオ</option>
                        <option value="ビモータ">ビモータ</option>
                        <option value="ベータ</">ベータ</option>
                        <option value="マーニ">マーニ</option>
                        <option value="マラグー">マラグーティ</option>
                        <option value="ベネリ">ベネリ</option>
                        <option value="ジレラ">ジレラ</option>
                        <option value="ＭＶアグスタ">ＭＶアグスタ</option>
                        <option value="ＦＢモンディアル">ＦＢモンディアル</option>
                        <option value="ベスパ">ベスパ</option>
                        <option value="ファンティック">ファンティック</option>
                        <option value="ランブレッタ">ランブレッタ</option>
                        <option value="モトモリーニ">モトモリーニ</option>
                        <option value="アディバ">アディバ</option>
                        <option value="ＴＭ　Ｒａｃｉｎｇ">ＴＭ　Ｒａｃｉｎｇ</option>
                        <option value="ＳＷＭ">ＳＷＭ</option>
                        <option value="イタルモト">イタルモト</option>
                        <option value="ＫＴＭ">ＫＴＭ</option>
                        <option value="トモス">トモス</option>
                        <option value="ソレックス">ソレックス</option>
                        <option value="プジョー">プジョー</option>
                        <option value="スコルパ">スコルパ</option>
                        <option value="ＭＢＫ">ＭＢＫ</option>
                        <option value="ＧＧ">ＧＧ</option>
                        <option value="ハスクバーナ">ハスクバーナ</option>
                        <option value="フサベル">フサベル</option>
                        <option value="ガス ガス">ガス ガス</option>
                        <option value="モンテッサ">モンテッサ</option>
                        <option value="デルビ">デルビ</option>
                        <option value="レオンアート">レオンアート</option>
                        <option value="ＡＪＰ">ＡＪＰ</option>
                        <option value="ブリット">ブリット</option>
                        <option value="ＧＰＸ">ＧＰＸ</option>
                        <option value="パジャジ">パジャジ</option>
                        <option value="ロイヤルエンフィールド">ロイヤルエンフィールド</option>
                        <option value="ＬＭＬ">ＬＭＬ</option>
                        <option value="ＴＶＳ">ＴＶＳ</option>
                        <option value="ウラル">ウラル</option>
                        <option value="幸福">幸福</option>
                        <option value="クインキ">クインキ</option>
                        <option value="ＤＡＥＬＩＭ">ＤＡＥＬＩＭ</option>
                        <option value="キムコ">キムコ</option>
                        <option value="ＰＧＯ">ＰＧＯ</option>
                        <option value="ＳＹＭ">ＳＹＭ</option>
                        <option value="ＴＧＢ">ＴＧＢ</option>
                        <option value="Ａモーター">Ａモーター</option>
                        <option value="ＨＡＲＴＦＯＲＤ">ＨＡＲＴＦＯＲＤ</option>
                        <option value="ＨＹＯＳＵＮＧ">ＨＹＯＳＵＮＧ</option>
                        <option value="ＢＲＰ">ＢＲＰ</option>
                        <option value="バギー">バギー</option>
                        <option value="トライク">トライク</option>
                        <option value="ポケバイ">ポケバイ</option>
                        <option value="スノーモービル">スノーモービル</option>
                        <option value="スノーバイク">スノーバイク</option>
                        <option value="その他">その他メーカー</option>
                    </select>
                </div>
                 <!--排気量 -->
                <div class="form-group">
                    <label class="control-label">排気量</label>
                    <select name="engine_displacement" class="form-control">
                        <option value="{{ $mybike_form->engine_displacement }}">{{ $mybike_form->engine_displacement }}</option>
                        <option value="～50cc">～50cc</option>
                        <option value="51cc～125cc">51cc～125cc</option>
                        <option value="126cc～250cc">126cc～250cc</option>
                        <option value="251cc～400cc">251cc～400cc</option>
                        <option value="401cc～750cc">401cc～750cc</option>
                        <option value="751cc～">751cc～</option>
                        <option value="電動などその他">電動などその他</option>
                    </select>
                </div>
                <!-- 車種年式 -->
                <div class="d-flex align-items-center">
                    <div class="form-group">
                        <label class="control-label">車種</label>
                        <input type="text" class="form-control" name="type" value="{{ $mybike_form->type }}">
                    </div>
                    <div class="form-group" style="margin-left: 100px;">
                        <label class="control-label">年式</label>
                        <select name="model_year" class="form-control">
                            <option value="{{ $mybike_form->model_year }}">{{ $mybike_form->model_year }}</option>
                            <option value="2020">R2(2020)</option>
                            <option value="2019">R1/H31(2019)</option>
                            <option value="2018">H30(2018)</option>
                            <option value="2017">H29(2017)</option>
                            <option value="2016">H28(2016)</option>
                            <option value="2015">H27(2015)</option>
                            <option value="2014">H26(2014)</option>
                            <option value="2013">H25(2013)</option>
                            <option value="2012">H24(2012)</option>
                            <option value="2011">H23(2011)</option>
                            <option value="2010">H22(2010)</option>
                            <option value="2009">H21(2009)</option>
                            <option value="2008">H20(2008)</option>
                            <option value="2007">H19(2007)</option>
                            <option value="2006">H18(2006)</option>
                            <option value="2005">H17(2005)</option>
                            <option value="2004">H16(2004)</option>
                            <option value="2003">H15(2003)</option>
                            <option value="2002">H14(2002)</option>
                            <option value="2001">H13(2001)</option>
                            <option value="2000">H12(2000)</option>
                            <option value="1999">H11(1999)</option>
                            <option value="1998">H10(1998)</option>
                            <option value="1997">H9(1997)</option>
                            <option value="1996">H8(1996)</option>
                            <option value="1995">H7(1995)</option>
                            <option value="1994">H6(1994)</option>
                            <option value="1993">H5(1993)</option>
                            <option value="1992">H4(1992)</option>
                            <option value="1991">H3(1991)</option>
                            <option value="1990">H2(1990)</option>
                            <option value="1989">H1/S64(1989)</option>
                            <option value="1988">S63(1988)</option>
                            <option value="1987">S62(1987)</option>
                            <option value="1986">S61(1986)</option>
                            <option value="1985">S60(1985)</option>
                            <option value="1984">S59(1984)</option>
                            <option value="1983">S58(1983)</option>
                            <option value="1982">S57(1982)</option>
                            <option value="1981">S56(1981)</option>
                            <option value="1980">S55(1980)</option>
                        </select>
                    </div>
                </div>
                <h2 class="personal-title">その他情報</h2>
                <!-- その他情報 -->
                <div class="d-flex align-items-start">
                    <div class="form-group">
                        <label class="control-label">軽自動車税</label>
                        <input type="text" class="form-control" name="light_vehicle_tax" value="{{ $mybike_form->light_vehicle_tax }}">
                        <label class="control-label">重量税</label>
                        <input type="text" class="form-control" name="weight_tax" value="{{ $mybike_form->weight_tax }}">
                        <label class="control-label">自賠責保険</label>
                        <input type="text" class="form-control" name="liability_insurance" value="{{ $mybike_form->liability_insurance }}">
                    </div>
                    <div class="form-group" style="margin-left: 100px;">
                        <label class="control-label">任意保険</label>
                        <input type="text" class="form-control" name="voluntary_insurance" value="{{ $mybike_form->voluntary_insurance }}">
                        <label class="control-label">車検</label>
                        <input type="text" class="form-control" name="vehicle_inspection" value="{{ $mybike_form->vehicle_inspection }}">
                        <label class="control-label">駐車場代</label>
                        <input type="text" class="form-control" name="parking_fee" value="{{ $mybike_form->parking_fee }}">
                        <label class="control-label">消耗品費</label>
                        <input type="text" class="form-control" name="consumables" value="{{ $mybike_form->consumables }}">
                    </div>
                </div>
                <!-- 画像 -->
                <div class="form-group row">
                    <label class="control-label">バイク画像</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="image">
                        <div class="form-text text-info">
                                設定中の画像: 
                                @if(isset($mybike_form->image_path))
                                <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/bike/{{ $mybike_form->image_path }}">
                                @else
                                <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/noimage.png">
                                ※設定中の画像はありません。
                                @endif
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                            </label>
                        </div>
                    </div>
                <!--</div>-->
                <input type="hidden" name="id" value="{{ $mybike_form->id }}">
                {{ csrf_field() }}
                <input type="submit" class="btn-primary add-btn" value="更新">
            </form>
        </div>
    </div>
</div>
@endsection
