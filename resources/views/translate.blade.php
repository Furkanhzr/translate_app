@extends('layouts.master')
@section('title', 'Translate Sitesi')
@section('content')
    <main class="container my-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="text-center mb-4">
                    <h2>Metin Çevirisi</h2>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <div style="width: 48%;">
                        <select class="form-select mb-3" id="source-language" name="source_language">
                            <option value="auto">Dili Algıla</option>
                            @foreach($languages as $key => $language)
                                <option value="{{ $key}}" {{$key == 'en' ? 'selected' : ''}}>{{ $language }}</option>
                            @endforeach
                        </select>
                        <textarea class="form-control" id="text" name="text" rows="8" placeholder="Çevrilecek metni buraya girin..."></textarea>
                    </div>

                    <div style="width: 48%;">
                        <select class="form-select mb-3" id="target-language" name="target_language">
                            @foreach($languages as $key => $language)
                                <option value="{{ $key}}" {{$key == 'tr' ? 'selected' : ''}}>{{ $language }}</option>
                            @endforeach
                        </select>
                        <textarea class="form-control" id="translationResult" rows="8" readonly placeholder="Çeviri sonucu burada görünecek..."></textarea>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        let typingTimer;
        let ajaxRequest;

        $('#text, #source-language, #target-language').on('input change', function () {
            clearTimeout(typingTimer);
            var text = $('#text').val();
            var source_language = $('#source-language').val();
            var target_language = $('#target-language').val();

            if (text === '') {
                resetFields(source_language);
            } else {
                typingTimer = setTimeout(function () {
                    if (source_language === 'auto') {
                        detect();
                    } else {
                        translate(text, source_language, target_language);
                    }
                }, 300);
            }
        });

        function translate(text, source_language, target_language) {
            if (ajaxRequest) {
                ajaxRequest.abort();
            }

            ajaxRequest = $.ajax({
                type: 'GET',
                url: '{{route('translate')}}',
                data: {
                    text: text,
                    source_language: source_language,
                    target_language: target_language,
                },
                success: function (data) {
                    $('#translationResult').val(data)
                },
                error: function () {
                    $('#translationResult').val('Çeviri yapılamadı.');
                },
                complete: function () {
                    ajaxRequest = null;
                }
            })
        }

        function detect() {
            var text = $('#text').val()
            var target_language = $('#target-language').val()

            if (ajaxRequest) {
                ajaxRequest.abort();
            }

            ajaxRequest = $.ajax({
                type: 'GET',
                url: '{{route('detect')}}',
                data: {
                    text: text,
                },
                success: function (data) {
                    $('#source-language').find('option:selected').text(`Detected - ${data['name']}`)
                    translate(text, data['language'], target_language)
                },
                error: function () {
                    $('#translationResult').val('Dil algılanamadı.');
                },
                complete: function () {
                    ajaxRequest = null;
                }
            })
        }

        function resetFields(source_language) {
            $('#translationResult').val('');

            if (source_language === 'auto') {
                $('#source-language').val('auto');
                $('#source-language option:selected').text('Dili Algıla');
            }
        }

    </script>
@endsection
