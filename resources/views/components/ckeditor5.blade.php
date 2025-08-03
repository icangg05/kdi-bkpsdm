@push('head')
	<link rel="stylesheet" href="{{ asset('ckeditor5/ckeditor5.css') }}" />
	<style>
		.ck-editor__editable {
			min-height: 300px !important;
			max-height: 550px !important;
			overflow-y: auto !important;
		}
	</style>
@endpush

@push('footer')
	<script type="importmap">
      {
        "imports": {
          "ckeditor5": "{{ asset('ckeditor5/ckeditor5.js') }}",
          "ckeditor5/": "{{ asset('ckeditor5/') }}"
        }
      }
    </script>
	<script type="module">
		import {
			ClassicEditor,
			Essentials,
			Paragraph,
			Bold,
			Italic,
			Underline,
			Strikethrough,
			Font,
			Alignment,
			List,
			Link,
			Image,
			ImageToolbar,
			ImageCaption,
			ImageStyle,
			ImageUpload,
			FileRepository,
			Table,
			TableToolbar,
			Heading,
			BlockQuote,
			CodeBlock,
			MediaEmbed
		} from "ckeditor5";

		class MyUploadAdapter {
			constructor(loader) {
				this.loader = loader;
			}

			upload() {
				return this.loader.file.then(file => {
					return new Promise((resolve, reject) => {
						const data = new FormData();
						data.append('upload', file);

						fetch('/upload-image', {
								method: 'POST',
								headers: {
									'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
										.content
								},
								body: data
							})
							.then(response => response.json())
							.then(data => {
								resolve({
									default: data.url
								});
							})
							.catch(reject);
					});
				});
			}

			abort() {}
		}

		function MyCustomUploadAdapterPlugin(editor) {
			editor.plugins.get('FileRepository').createUploadAdapter = loader => {
				return new MyUploadAdapter(loader);
			};
		}


		ClassicEditor.create(document.querySelector("#{{ $name }}"), {
				extraPlugins: [MyCustomUploadAdapterPlugin],
				licenseKey: "GPL", // Or <YOUR_LICENSE_KEY>
				plugins: [
					Essentials,
					Paragraph,
					Heading,
					Bold,
					Italic,
					Underline,
					Strikethrough,
					Font,
					Alignment,
					List,
					Link,
					Image,
					ImageToolbar,
					ImageCaption,
					ImageStyle,
					ImageUpload,
					FileRepository,
					Table,
					TableToolbar,
					BlockQuote,
					CodeBlock,
					MediaEmbed
				],
				toolbar: [
					"undo", "redo",
					"|", "heading",
					"|", "bold", "italic", "underline", "strikethrough",
					"|", "fontSize",
					"|", "alignment",
					"|", "numberedList", "bulletedList",
					"|", "link", "imageUpload", "insertTable", "mediaEmbed",
					"|", "blockQuote",
				],
				image: {
					toolbar: ["imageStyle:full", "imageStyle:side", "|", "imageTextAlternative"]
				},
				table: {
					contentToolbar: ["tableColumn", "tableRow", "mergeTableCells"]
				},
			})
			.then((editor) => {
				window.editor = editor;
			})
			.catch((error) => {
				console.error(error);
			});
	</script>
@endpush

<textarea name="{{ $name }}" id="{{ $name }}" class="form-control">{{ old($name, $value) }}</textarea>
