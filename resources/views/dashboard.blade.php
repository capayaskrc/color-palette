@extends('layouts.default-content')

@section('content')
  <div x-data="colorData">
    <div class="max-w-[1200px] mx-auto mt-6 rounded-lg relative">
        <div class="max-w-[1200px] h-96 bg-[#dadada] rounded-lg flex flex-col justify-center">
            <a x-show="selectedColors.length === 0" class="text-center self-center text-sm font-500">
                click on a template to display on the banner
            </a>
            <div x-show="selectedColors.length > 0" class="flex justify-start items-center">
                <template x-for="(color, index) in selectedColors" :key="color">
                    <div :style="'background-color:' + color" class="color-box flex-grow h-96" :class="getColorBoxClasses(index)"></div>
                </template>
            </div>
        </div>

        <button @click="openAddTemplateModal" class="absolute bottom-0 left-0 mb-4 ml-4 px-4 py-2 border border-green-500 font-500 text-sm bg-white text-black rounded-lg flex items-center hover:bg-green-700 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Add new template
        </button>
    </div>
      <div class="mt-9">
          <div class="font-bold mb-10 text-xl">
              <h1>Template</h1>
          </div>
          <template x-if="colorTemplates.length > 0">
              <ul>
                  <template x-for="template in colorTemplates" :key="template.id">
                      <li class="flex items-center justify-between">
                          <div class="mb-8">
                              <p class="mb-4 text-sm font-semibold" x-text="template.template_name"></p>
                              <div class="flex">
                                  <template x-for="color in template.colors" :key="color">
                                      <div x-bind:style="'background-color:' + color" class="w-6 h-6 rounded mr-1"></div>
                                  </template>
                              </div>
                          </div>
                          <div class="flex ">
                              <button class="py-1 border border-gray-700 bg-white px-4 mr-2 rounded-lg" @click="deleteTemplate(template.id)">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                              </svg>
                              </button>
                              <button
                                  class=" py-2 w-32 border border-blue-500 rounded-lg text-center"
                                  :class="{
                                        'bg-green-500 text-white': isTemplateSelected(template.id),
                                        'border-blue-500 text-blue-500': !isTemplateSelected(template.id)
                                    }"
                                  @click="selectTemplate(template.id)"
                              >
                                  <span x-text="getSelectButtonText(template.id)"></span>
                              </button>

                          </div>
                      </li>
                  </template>
              </ul>
          </template>
          <template x-if="colorTemplates.length === 0">
              <a class="font-500 text-sm">
                  There is no template to display
              </a>
          </template>
      </div>
      <div x-show="showAddTemplateModal" id="add-template-modal" x-transition tabindex="-2" aria-hidden="true" class="fixed inset-0 flex items-center justify-center z-50">
          <div class="fixed inset-0 bg-black opacity-50 backdrop-blur"></div>
             <div class="relative bg-white rounded-lg shadow max-w-xl w-full mx-4 md:mx-0">
              <div class="relative bg-white rounded-lg shadow">
                  <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                          @click="hideAddTemplateModal">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
                  <div class="p-12">
                      <h2 class="text-xl font-700 mb-16">Add New Template</h2>
                      <input type="text" x-model="templateName" name="template_name" placeholder="Enter template name" class="border border-gray-300 font-500 px-3 py-2 rounded-md w-full mb-4">
                      <hr class="border-gray-300 mb-4"> <!-- Horizontal Line -->
                      <div class="flex items-center relative mb-4">
                          <input x-model="color" type="text" placeholder="Enter color hex code" class="border border-gray-300 font-500 pr-14 px-3 py-2 rounded-md w-3/4 mr-2 h-full bg-transparent">
                          <input type="color" x-model="color" class="absolute bg-white right-36 h-7 w-7 cursor-pointer border-none">
                          <button @click="addColor" class="bg-white text-black font-500 border-2 border-blue-500 py-1.5 px-6 rounded-lg whitespace-nowrap">Add Color</button>
                      </div>
                      <hr class="border-gray-300 mb-4">
                      <div class="font-500" x-show="colors.length === 0">
                          No colors in the template
                      </div>
                      <div x-show="colors.length > 0">
                          <div class="flex">
                              <template x-for="(colorItem, index) in colors">
                                  <div :style="'background-color:' + colorItem" class="w-6 h-6 rounded mr-1"></div>
                              </template>
                          </div>
                      </div>

                      <div class="mt-8 flex justify-end">
                          <button class="bg-gray-200 border border-[#dddddd] text-black px-6 py-2 rounded-lg mr-2.5" @click="hideAddTemplateModal">Back</button>
                          <button class="border border-green-500 font-500 text-sm text-black px-6 py-2 rounded-lg" @click="saveColorPalette" >Save</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
    <script>

        document.addEventListener('alpine:init', () => {
            Alpine.data('colorData', () => ({
                showAddTemplateModal: false,
                templateName: '',
                color: '',
                colors: [],
                colorTemplates: [],
                selectedColors: [],
                selectedTemplateId: null,

                addColor() {
                    this.colors.push(this.color);
                    this.color = '';
                },

                async init() {
                    let response = await fetch(`{!! route('view_dashboard') !!}`);
                    this.colorTemplates = await response.json();
                },

                saveColorPalette() {
                    const formData = new FormData();
                    formData.append('template_name', this.templateName);
                    formData.append('colors', JSON.stringify(this.colors));

                    fetch('{!! route('save_color_template')!!}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: formData,
                    })
                        .then(response => response.json())
                        .then(data => {
                            console.log('Saved successfully:', data);
                            this.hideAddTemplateModal();

                            // Fetch the updated list of color templates from the server
                            fetch(`{!! route('view_dashboard') !!}`)
                                .then(response => response.json())
                                .then(updatedTemplates => {
                                    // Update the colorTemplates data with the new data
                                    this.colorTemplates = updatedTemplates;
                                })
                                .catch(error => {
                                    console.error('Error fetching updated templates:', error);
                                });
                        })
                        .catch(error => {
                            console.error('Error saving:', error);
                        });
                },

                deleteTemplate(templateId) {
                        fetch('{!! route('delete_color_template', ['ID']) !!}'.replace('ID', templateId), {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            },
                        })
                            .then(response => response.json())
                            .then(data => {
                                console.log(data.message);
                                this.colorTemplates = this.colorTemplates.filter(template => template.id !== templateId);
                            })
                            .catch(error => {
                                console.error('Error deleting template:', error);
                            });
                },


                getColorBoxClasses(index) {
                    const isFirst = index === 0;
                    const isLast = index === this.selectedColors.length - 1;

                    return {
                        'rounded-l-lg': isFirst,
                        'rounded-r-lg': isLast,
                        '': !isFirst && !isLast,
                    };
                },


                isTemplateSelected(templateId) {
                    return this.selectedTemplateId === templateId;
                },

                getSelectButtonText(templateId) {
                    return this.isTemplateSelected(templateId) ? 'Selected' : 'Select';
                },

                selectTemplate(templateId) {
                    const selectedTemplate = this.colorTemplates.find(template => template.id === templateId);
                    this.selectedColors = selectedTemplate.colors;
                    this.selectedTemplateId = templateId;
                },


                openAddTemplateModal() {
                    this.showAddTemplateModal = true;
                },
                hideAddTemplateModal() {
                    this.showAddTemplateModal = false;
                    this.colors = [];
                },


            }));
        });

    </script>

@endsection
