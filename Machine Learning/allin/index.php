<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              clifford: "#da373d",
            },
          },
        },
      };
    </script>
    <style type="text/tailwindcss">
      @layer utilities {
        .content-auto {
          content-visibility: auto;
        }
      }
    </style>
  </head>
  <body class="antialiased font-roboto bg-gray-200">
    <div class="flex h-screen justify-center items-center">
      <div class="w-1/3 bg-gray-100 border shadow-lg rounded-lg p-6">
        <!-- form -->
        <form action="bin/main.php" method="post" enctype="multipart/form-data">
          <div class="mb-4">
            <label for="input1" class="block text-base font-medium text-gray-500 mb-2">
              Prediksi data ke-
            </label>
            <input
              type="number"
			  name ="menuju"
              class="
                transation-colors
                duration-300
                border border-blue-400
                rounded-lg
                focus:border-blue-600 focus:outline-none
                w-full
                px-2
                py-2
              "
              placeholder="input your number"
            />
          </div>
          <div class="mb-4">
            <label for="input1" class="block text-base font-medium text-gray-500 mb-2">
              Nilai ke X :
            </label>
            <input
              type="text"
			  name="nilaix"
              class="
                transation-colors
                duration-300
                border border-blue-400
                rounded-lg
                focus:border-blue-600 focus:outline-none
                w-full
                px-2
                py-2
              "
              placeholder="input your number"
            />
          </div>
          <div class="mb-4">
            <label for="input1" class="block text-base font-medium text-gray-500 mb-2">
              Nilai ke Y :
            </label>
            <input
              type="text"
			  name="nilaiy"
              class="
                transation-colors
                duration-300
                border border-blue-400
                rounded-lg
                focus:border-blue-600 focus:outline-none
                w-full
                px-2
                py-2
              "
              placeholder="input your number"
            />
          </div>
          <div>
            <button
              class="
                flex
                items-center
                inline-flex
                btn
                bg-blue-500
                hover:bg-blue-700
                py-2
                px-3
                rounded
                shadow-lg
                text-white text-base
                font-semibold
              "
              type="submit"
			  name="excute"
            >
              <svg
                class="w-5 h-5"
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                />
              </svg>
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
