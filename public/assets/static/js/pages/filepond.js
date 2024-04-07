FilePond.registerPlugin(
  FilePondPluginImagePreview,
  FilePondPluginFileValidateSize,
  FilePondPluginFileValidateType
);

const multipleFilesFilePond = document.querySelectorAll(
  ".multiple-files-filepond"
);

multipleFilesFilePond.forEach((filePond) => {
  FilePond.create(filePond, {
    credits: null,
    allowImagePreview: true,
    imagePreviewHeight: 150,
    allowMultiple: true,
    allowFileEncode: false,
    required: true,
    storeAsFile: true,
    allowFileTypeValidation: true,
    acceptedFileTypes: ["image/png", "image/jpg", "image/jpeg"],
    labelFileTypeNotAllowed: "Only PNG, JPG, JPEG files are allowed",
    allowFileSizeValidation: true,
    maxFileSize: "2MB",
    labelMaxFileSizeExceeded: "File is too large",
  });
});
