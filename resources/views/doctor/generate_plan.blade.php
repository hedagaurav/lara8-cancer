@extends('layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/ckeditor5.css') }}">
    <script src="{{ asset('assets/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/ckeditor/adapters/jquery.js') }}"></script> --}}
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.css" />
    <script src="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.umd.js"></script>

    <!-- Add if you use premium features. -->
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5-premium-features/44.1.0/ckeditor5-premium-features.css" />
    <script src="https://cdn.ckeditor.com/ckeditor5-premium-features/44.1.0/ckeditor5-premium-features.umd.js"></script>
    <!--  -->


    <h3>Generate Plan</h3>
    <div>

        <form action="{{ route('doctor.create_plan') }}" method="post">
            <label for="treatment_plan">Treatment Plan</label>
            <textarea name="treatment_plan" id="treatment_plan" cols="30" rows="10"></textarea>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            // ckeditor 4
            // $('#treatment_plan').ckeditor();

            // ckeditor 5
            const {
                ClassicEditor,
                Essentials,
                Bold,
                Italic,
                Font,
                Paragraph
            } = CKEDITOR;


            ClassicEditor
                .create(document.querySelector('#treatment_plan'), {
                    // development licence
                    // licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NjYyNzUxOTksImp0aSI6IjYyYTI5MzBjLTA5YzgtNDJlMS1iOTExLTA1NGQyMzQ3ZjI2OCIsImxpY2Vuc2VkSG9zdHMiOlsiMTI3LjAuMC4xIiwibG9jYWxob3N0IiwiMTkyLjE2OC4qLioiLCIxMC4qLiouKiIsIjE3Mi4qLiouKiIsIioudGVzdCIsIioubG9jYWxob3N0IiwiKi5sb2NhbCJdLCJ1c2FnZUVuZHBvaW50IjoiaHR0cHM6Ly9wcm94eS1ldmVudC5ja2VkaXRvci5jb20iLCJkaXN0cmlidXRpb25DaGFubmVsIjpbImNsb3VkIiwiZHJ1cGFsIl0sImxpY2Vuc2VUeXBlIjoiZGV2ZWxvcG1lbnQiLCJmZWF0dXJlcyI6WyJEUlVQIl0sInZjIjoiNzkyMzM0MWMifQ.irJvaNv6enlii6waIe_0T0h_kSTcRzq5rrJ5NX2hyXe2qc95XfjKMbEasRGKu0pnudZb9BXGaXWX2-Y39yQGCw',
                    // trial licence 14 days
                    licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3MzU5NDg3OTksImp0aSI6ImQzOWFlMzMzLTkzMzktNDM3Mi1hYWFlLWRlOTk1OGE3ZWJhNSIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiLCJzaCJdLCJ3aGl0ZUxhYmVsIjp0cnVlLCJsaWNlbnNlVHlwZSI6InRyaWFsIiwiZmVhdHVyZXMiOlsiKiJdLCJ2YyI6IjY5NjVhZGRmIn0.ZExnVBXmDNnqKVJ3zD3pTStbENFuO2clQa86qbpXefufHseT2TUHcdstVaYlHrz6_qFeVkIWloMdeRhACfTCXg',
                    plugins: [Essentials, Bold, Italic, Font, Paragraph],
                    toolbar: [
                        'undo', 'redo', '|', 'bold', 'italic', '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                    ],
                    menuBar: {
                        isVisible: true
                    }

                })
                .catch(error => {
                    console.log(error);
                });
        });
    </script>
@endsection
