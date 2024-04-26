$(document).ready(function() {
  $(".delete-item").click(function (e) {
      const form = $(this).closest("form");
      e.preventDefault();
      Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!",
      }).then((result) => {
          if (result.isConfirmed) {
              form.submit();
          }
      });
  });
});


