@extends('layouts.default-content')

@section('content')
  <div x-data="colorData">
    <div class="max-w-[1200px] mx-auto mt-6 rounded-2xl relative">
        <div class="max-w-[1200px] h-96 bg-[#dadada] rounded-2xl flex flex-col justify-center">
            <a x-show="selectedColors.length === 0" class="text-center self-center text-sm font-500">
                click on a template to display on the banner
            </a>
            <div x-show="selectedColors.length > 0" class="flex justify-start items-center">
                <template x-for="(color, index) in selectedColors" :key="color">
                    <div :style="'background-color:' + color" class="color-box flex-grow h-96" :class="getColorBoxClasses(index)"></div>
                </template>
            </div>
        </div>

        <button @click="openAddTemplateModal" class="absolute bottom-0 left-0 mb-4 ml-4 px-4 py-2 border border-green-500 font-500 text-sm bg-white text-black rounded-2xl flex items-center hover:bg-green-700 hover:text-white">
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
                              <button class="py-1 border border-gray-700 bg-white px-4 mr-2 rounded-2xl" @click="deleteTemplate(template.id)">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                              </svg>
                              </button>
                              <button
                                  class=" py-2 w-32 border border-blue-500 rounded-2xl text-center"
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
             <div class="relative bg-white rounded-2xl shadow max-w-xl w-full mx-4 md:mx-0">
              <div class="relative bg-white rounded-2xl shadow">
                  <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-2xl text-sm p-1.5 ml-auto inline-flex items-center"
                          @click="hideAddTemplateModal">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
                  <div class="p-12">
                      <h2 class="text-xl font-700 mb-16">Add New Template</h2>
                      <input
                          type="text"
                          x-model="templateName"
                          name="template_name"
                          placeholder="Enter template name"
                          class="border border-gray-300 font-500 px-3 py-2 rounded-md w-full mb-4"
                      >
                      <hr class="border-gray-300 mb-4"> <!-- Horizontal Line -->
                      <div class="flex items-center relative mb-4">
                          <input x-model="color" type="text"  placeholder="Enter color hex code" class="border border-gray-300 font-500 pr-14 px-3 py-2 rounded-md w-3/4 mr-2 h-full bg-transparent">
                          <input type="color" x-model="color" class="absolute bg-white right-36 h-7 w-7 cursor-pointer border-none">
                          <button @click="addColor" class="bg-white text-black font-500 border-2 border-blue-500 py-1.5 px-6 rounded-2xl whitespace-nowrap">Add Color</button>
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
                          <button class="bg-gray-200 border border-[#dddddd] text-black px-6 py-2 rounded-2xl mr-2.5" @click="hideAddTemplateModal">Back</button>
                          <button
                              class="border border-green-500 font-500 text-sm text-black px-6 py-2 rounded-2xl"
                              @click="saveClicked = true; saveColorPalette();"
                          >
                              Save
                          </button>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div x-show="showDeleteSuccessToast" x-transition id="toast-success" class=" fixed bottom-8 right-8 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-2xl shadow" role="alert">
          <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-2xl">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
          </div>
          <div class="ml-3 text-sm font-normal" x-text="deleteSuccessText"></div>
          <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-2xl focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8" aria-label="Close"
                  @click="showDeleteSuccessToast = false">
              <span class="sr-only">Close</span>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </button>
      </div>
      <div x-show="showDeleteOngoingToast" x-transition id="toast-simple" class="fixed bottom-8 right-8 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-2xl shadow" role="alert">
          <svg role="status" class="w-6 h-6 mr-2 text-gray-200 animate-spin fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
              <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
          </svg>
          <div class="pl-4 text-sm font-normal" x-text="deleteOngoingText"></div>
      </div>

      <div x-show="showDeleteFailureToast" x-transition id="toast-failure" class="fixed bottom-8 right-8 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-2xl shadow" role="alert">
          <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-2xl">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
          </div>
          <div class="ml-3 text-sm font-normal" x-text="deleteFailureText"></div>
          <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-2xl focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8" aria-label="Close"
                  @click="showDeleteFailureToast = false">
              <span class="sr-only">Close</span>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </button>
      </div>

      <div x-show="showSaveSuccessToast" x-transition id="toast-success" class=" fixed bottom-8 right-8 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-2xl shadow" role="alert">
          <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-2xl">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
          </div>
          <div class="ml-3 text-sm font-normal" x-text="saveSuccessText"></div>
          <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-2xl focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8" aria-label="Close"
                  @click="showSaveSuccessToast = false">
              <span class="sr-only">Close</span>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </button>
      </div>

      <div x-show="showSaveOngoingToast" x-transition id="toast-simple" class="fixed bottom-8 right-8 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-2xl shadow" role="alert">
          <svg role="status" class="w-6 h-6 mr-2 text-gray-200 animate-spin fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
              <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
          </svg>
          <div class="pl-4 text-sm font-normal" x-text="saveOngoingText"></div>
      </div>

      <div x-show="showSaveFailureToast" x-transition id="toast-failure" class="fixed bottom-8 right-8 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-2xl shadow" role="alert">
          <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-2xl">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
          </div>
          <div class="ml-3 text-sm font-normal" x-text="saveFailureText"></div>
          <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-2xl focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8" aria-label="Close"
                  @click="showSaveFailureToast = false">
              <span class="sr-only">Close</span>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </button>
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

                showDeleteSuccessToast: false,
                deleteSuccessText: '',
                showDeleteOngoingToast: false,
                deleteOngoingText: '',
                showDeleteFailureToast: false,
                deleteFailureText: '',

                showSaveSuccessToast: false,
                saveSuccessText: '',
                showSaveOngoingToast: false,
                saveOngoingText: '',
                showSaveFailureToast: false,
                saveFailureText: '',

                addColor() {
                    if (this.color !== '' ) {
                        this.colors.push(this.color);
                        this.color = '';
                    }
                },

                async init() {
                    let response = await fetch(`{!! route('view_dashboard') !!}`);
                    this.colorTemplates = await response.json();
                    const selectedTemplate = this.colorTemplates.find(template => template.is_selected);
                    if (selectedTemplate) {
                        this.selectedColors = selectedTemplate.colors;
                        this.selectedTemplateId = selectedTemplate.id

                    }
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
                            this.colorTemplates = data;
                            this.showSaveSuccessToast = true;
                            this.saveSuccessText = 'Template successfully added.';
                            this.templateName= '';
                        })
                        .catch(error => {
                            this.showSaveFailureToast = true;
                            this.saveFailureText= 'Operation failed. Please try again later, or consult with the dev team.';
                        }).finally(() => {
                        this.showSaveOngoingToast = false;
                        this.saveOngoingText = "";
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
                                this.colorTemplates = data;
                                if (this.selectedTemplateId === templateId) {
                                    this.selectedColors = [];
                                    this.selectedTemplateId = null;
                                }
                                this.showDeleteSuccessToast = true;
                                this.deleteSuccessText = 'Template successfully removed.';
                            })
                            .catch(error => {
                                this.showDeleteFailureToast = true;
                                this.deleteFailureText= 'Operation failed. Please try again later, or consult with the dev team.';
                                console.error('Error deleting template:', error);
                            })
                            .finally(() => {
                                this.showDeleteOngoingToast = false;
                                this.deleteOngoingText = "";
                            });
                },

                selectTemplate(templateId) {
                    const previouslySelectedTemplate = this.colorTemplates.find(template => template.is_selected);

                    if (previouslySelectedTemplate && previouslySelectedTemplate.id === templateId) {
                        previouslySelectedTemplate.is_selected = false;
                        this.updateSelectedStatus(templateId, false);
                        this.selectedColors = [];
                        this.selectedTemplateId = null;
                    } else {
                        if (previouslySelectedTemplate) {
                            previouslySelectedTemplate.is_selected = false;
                            this.updateSelectedStatus(previouslySelectedTemplate.id, false);
                        }

                        const selectedTemplate = this.colorTemplates.find(template => template.id === templateId);
                        selectedTemplate.is_selected = true;
                        this.updateSelectedStatus(templateId, true);

                        this.selectedColors = selectedTemplate.colors;
                        this.selectedTemplateId = templateId;
                    }
                },


                updateSelectedStatus(templateId, isSelected) {
                    const formData = {
                        is_selected: isSelected,
                    };

                    fetch('{!! route('update_selected_template', ['ID']) !!}'.replace('ID', templateId), {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify(formData),
                    }).then(response => response.json()).then(data => {
                            this.colorTemplates = data;
                        })
                        .catch(error => {
                            console.error('Error updating selected status:', error);
                        });
                },

                getColorBoxClasses(index) {
                    const isFirst = index === 0;
                    const isLast = index === this.selectedColors.length - 1;
                    return {
                        'rounded-l-2xl': isFirst,
                        'rounded-r-2xl': isLast,
                        '': !isFirst && !isLast,
                    };
                },

                isTemplateSelected(templateId) {
                    return this.selectedTemplateId === templateId;
                },

                getSelectButtonText(templateId) {
                    return this.isTemplateSelected(templateId) ? 'Selected' : 'Select';
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
