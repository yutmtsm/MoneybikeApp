@extends('layouts.common.common')
@section('css', 'mypage.css')

@section('title', '新規バイク追加')

@section('content')
<div class="container">
    <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscopeitemtype="https://schema.org/ListItem">
            <i class="fa fa-home text-dark" aria-hidden="true"></i>
            <a itemprop="item" href="{{ url('/mypage') }}">
                <span itemprop="name">ホーム</span>
            </a>
            <i class="fa fa-caret-right text-dark ml-2 mr-2" aria-hidden="true"></i>
            <meta itemprop="position" content="1" />
        </li>
        <li class=" text-dark current-nav" itemprop="itemListElement" itemscopeitemtype="https://schema.org/ListItem">
            <i class="fa fa-motorcycle" aria-hidden="true"></i>
            <span itemprop="name">バイク追加</span>
            <meta itemprop="position" content="1" />
        </li>
    </ol>
    <div class="row" style="width: 100%;">
        <div class="col-md-6 mx-auto" >
            <form action="{{ action('Admin\BikeController@store') }}" method="post" enctype="multipart/form-data">
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
                        <option value="">メーカーを選択してください</option>
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
                        <option value="">排気量を選択して下さい</option>
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
                <div class="align-items-center">
                    <div class="form-group">
                        <label class="control-label">車種</label>
                        <input type="text" class="form-control" name="type" value="{{ old('type') }}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">年式</label>
                        <select name="model_year" class="form-control mdoel-year">
                            <option value="">年式を選択してください</option>
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
                <div class="align-items-start">
                    <div class="form-group">
                        <label class="control-label">軽自動車税 ※年額</label>
                        <select name="light_vehicle_tax" class="form-control">
                            <option value="">コメント参考に選択してください</option>
                            <option value="2000">2000円：原付（総排気量50cc以下）</option>
                            <option value="2000円">2000円：原付（総排気量50cc超 90cc以下）</option>
                            <option value="2400">2400円：原付（総排気量90cc超 125cc以下）</option>
                            <option value="3600">3600円：二輪（総排気量125cc超 250cc以下）</option>
                            <option value="6000">6000円：二輪（総排気量250cc超）</option>
                            <option value="0">払ってない？？？</option>
                        </select>
                        <label class="control-label">重量税</label>
                        <input type="text" class="form-control" name="weight_tax" value="{{ old('weight_tax') }}">
                        <label class="control-label">自賠責保険</label>
                        <select name="liability_insurance" class="form-control">
                            <option value="">コメント参考に選択してください</option>
                            <option value="7060">7060円：保険期間1年（排気量125cc以下のバイク）</option>
                            <option value="4475">4475円：保険期間2年（排気量125cc以下のバイク）</option>
                            <option value="3597">3597円：保険期間3年（排気量125cc以下のバイク）</option>
                            <option value="3150">3150円：保険期間4年（排気量125cc以下のバイク）</option>
                            <option value="2876">2876円：保険期間5年（排気量125cc以下のバイク）</option>
                            <option value="7670">7670円：保険期間1年（排気量125cc超～250cc以下のバイク）</option>
                            <option value="5080">5080円：保険期間2年（排気量125cc超～250cc以下のバイク）</option>
                            <option value="4200">4200円：保険期間3年（排気量125cc超～250cc以下のバイク）</option>
                            <option value="3470">3470円：保険期間4年（排気量125cc超～250cc以下のバイク）</option>
                            <option value="7060">7060円：保険期間5年（排気量125cc超～250cc以下のバイク）</option>
                            <option value="9680">9680円：保険期間2年（排気量250cc以上のバイク）</option>
                            <option value="9870">9870円：保険期間2年1ヶ月（排気量250cc以上のバイク）</option>
                            <option value="11900">11900円：保険期間3年（排気量250cc以上のバイク）</option>
                            <option value="12080">12080円：保険期間3年1ヶ月（排気量250cc以上のバイク）</option>
                            <option value="0">払ってない？？？</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">任意保険</label>
                        <input type="text" class="form-control" name="voluntary_insurance" value="{{ old('voluntary_insurance') }}">
                        <label class="control-label">車検</label>
                        <input type="text" class="form-control" name="vehicle_inspection" value="{{ old('vehicle_inspection') }}">
                        <label class="control-label">駐車場代</label>
                        <input type="text" class="form-control" name="parking_fee" value="{{ old('parking_fee') }}">
                        <label class="control-label">消耗品費</label>
                        <input type="text" class="form-control" name="consumables" value="{{ old('consumables') }}">
                    </div>
                </div>
                <!-- 画像 -->
                <div class="form-group">
                    <label class="control-label">バイク画像</label>
                    <input type="file" class="form-control-file" name="image">
                    <!--</div>-->
                    {{ csrf_field() }}
                    <input type="submit" class="btn-primary add-btn" value="新規追加">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
