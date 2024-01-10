   {{ csrf_field() }}
   <div class="col-lg-6">
       <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
           {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Lorem Ipsum', 'id' => 'name']) }}
           {{ Form::label('name', 'Property Name', ['class' => 'lab-style']) }}
           @if ($errors->has('name'))
               <span class="help-block">
                   <strong>{{ $errors->first('name') }}</strong>
               </span>
           @endif
       </div>
   </div>
   <div class="col-lg-6">
       <div class="form-group{{ $errors->has('property_type_id') ? ' has-error' : '' }}">
           {{ Form::select('property_type_id', $types, 1, ['class' => 'fa form-select', 'id' => 'Property', 'aria-label' => 'Default select example']) }}
           {{ Form::label('property_type_id', 'Property Type', ['class' => 'lab-style']) }}
           @if ($errors->has('property_type_id'))
               <span class="help-block">
                   <strong>{{ $errors->first('property_type_id') }}</strong>
               </span>
           @endif
       </div>
   </div>
   <div class="col-lg-12">
       <div class="form-group">
           {{ Form::text('address1', null, ['class' => 'form-control mb-3', 'placeholder' => 'Address Line Comes Here 123,']) }}
           {{ Form::label('address1', 'Address 1', ['class' => 'lab-style']) }}
           @if ($errors->has('address1'))
               <span class="help-block">
                   <strong>{{ $errors->first('address1') }}</strong>
               </span>
           @endif
       </div>
   </div>
   <div class="col-lg-12">
       <div class="form-group">
           {{ Form::text('address2', null, ['class' => 'form-control', 'placeholder' => 'Address Line Comes Here.']) }}
           {{ Form::label('address2', 'Address 2', ['class' => 'lab-style']) }}
           @if ($errors->has('address2'))
               <span class="help-block">
                   <strong>{{ $errors->first('address2') }}</strong>
               </span>
           @endif
       </div>
   </div>
   <div class="col-lg-6">
       <div class="form-group">
           {!! Form::file('indoor_images[]', [
               'class' => 'form-control',
               'placeholder' => 'Lorem Ipsum',
               'id' => 'indoor_images',
               'multiple' => 'multiple',
           ]) !!}
           {!! Form::label('indoor_images', 'Indoor Images/Videos', ['class' => 'lab-style']) !!}
           @if ($errors->has('indoor_images'))
               <span class="help-block">
                   <strong>{{ $errors->first('indoor_images') }}</strong>
               </span>
           @endif
       </div>
   </div>

   <div class="col-lg-6">
       <div class="form-group">
           {!! Form::file('outdoor_images[]', [
               'class' => 'form-control',
               'placeholder' => 'Lorem Ipsum',
               'id' => 'outdoor_images',
               'multiple' => 'multiple',
           ]) !!}
           {!! Form::label('outdoor_images', 'Outdoor Images/Videos', ['class' => 'lab-style']) !!}
           @if ($errors->has('outdoor_images'))
               <span class="help-block">
                   <strong>{{ $errors->first('outdoor_images') }}</strong>
               </span>
           @endif
       </div>
   </div>
   <div class="col-lg-12">
       <div class="form-group">
           {{ Form::label('amenities', 'Amenities', ['class' => 'lab-style']) }}
           <div class="AmenitiesForm amenities-fields residential-amenities">
               <div class="custom-row">

                   <div class="Bedroom bedroom-section">
                       <div class="d-flex align-items-center">

                           <span class="mx-2">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                   fill="none">
                                   <path
                                       d="M22 12C22 10.9 21.1 10 20 10V7C20 5.9 19.1 5 18 5H6C4.9 5 4 5.9 4 7V10C2.9 10 2 10.9 2 12V17H3.33L4 19H5L5.67 17H18.34L19 19H20L20.67 17H22V12ZM18 10H13V7H18V10ZM6 7H11V10H6V7ZM4 12H20V15H4V12Z"
                                       fill="#868686" />
                               </svg>
                           </span>
                           {{ Form::label('bedrooms', 'Bedroom:', ['class' => 'svg-label']) }}
                           {{ Form::text('bedrooms', 1, ['class' => 'AmenitiesInput', 'id' => 'bedrooms', 'placeholder' => '1']) }}
                       </div>
                   </div>

                   <div class="Bedroom bathroom-section">
                       <div class="d-flex align-items-center">
                           <span class="mx-2">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                   fill="none">
                                   <path
                                       d="M7 9C6.45 9 5.97933 8.80433 5.588 8.413C5.19667 8.02167 5.00067 7.55067 5 7C5 6.45 5.196 5.97933 5.588 5.588C5.98 5.19667 6.45067 5.00067 7 5C7.55 5 8.021 5.196 8.413 5.588C8.805 5.98 9.00067 6.45067 9 7C9 7.55 8.80433 8.021 8.413 8.413C8.02167 8.805 7.55067 9.00067 7 9ZM5 22C4.71667 22 4.47933 21.904 4.288 21.712C4.09667 21.52 4.00067 21.2827 4 21C3.45 21 2.97933 20.8043 2.588 20.413C2.19667 20.0217 2.00067 19.5507 2 19V13H5V12.25C5 11.6167 5.21667 11.0833 5.65 10.65C6.08333 10.2167 6.61667 10 7.25 10C7.58333 10 7.89167 10.0667 8.175 10.2C8.45833 10.3333 8.71667 10.5167 8.95 10.75L10.35 12.3C10.4833 12.4333 10.6127 12.5583 10.738 12.675C10.8633 12.7917 11.0007 12.9 11.15 13H18V4.85C18 4.61667 17.9167 4.41667 17.75 4.25C17.5833 4.08333 17.3833 4 17.15 4C17.05 4 16.954 4.021 16.862 4.063C16.77 4.105 16.6827 4.16733 16.6 4.25L15.35 5.5C15.4333 5.78333 15.45 6.06267 15.4 6.338C15.35 6.61333 15.25 6.86733 15.1 7.1L12.35 4.3C12.5833 4.15 12.8333 4.054 13.1 4.012C13.3667 3.97 13.6333 3.99933 13.9 4.1L15.15 2.85C15.4167 2.58333 15.721 2.375 16.063 2.225C16.405 2.075 16.7673 2 17.15 2C17.95 2 18.625 2.275 19.175 2.825C19.725 3.375 20 4.05 20 4.85V13H22V19C22 19.55 21.8043 20.021 21.413 20.413C21.0217 20.805 20.5507 21.0007 20 21C20 21.2833 19.904 21.521 19.712 21.713C19.52 21.905 19.2827 22.0007 19 22H5ZM4 19H20V15H4V19Z"
                                       fill="#868686" />
                               </svg>
                           </span>
                           {{ Form::label('bathrooms', 'Bathroom:', ['class' => 'svg-label']) }}
                           {{ Form::text('bathrooms', 1, ['class' => 'AmenitiesInput', 'id' => 'bathrooms', 'placeholder' => '1']) }}
                       </div>
                   </div>

                   <div class="Bedroom parking-section">
                       <div class="d-flex align-items-center">
                           <span class="mx-2">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                   fill="none">
                                   <path
                                       d="M19 20H5V21C5 21.2652 4.89464 21.5196 4.70711 21.7071C4.51957 21.8946 4.26522 22 4 22H3C2.73478 22 2.48043 21.8946 2.29289 21.7071C2.10536 21.5196 2 21.2652 2 21V11L4.48 5.212C4.63432 4.852 4.89096 4.54524 5.21805 4.32978C5.54515 4.11432 5.92832 3.99965 6.32 4H17.68C18.0713 4.00004 18.4541 4.1149 18.7808 4.33033C19.1075 4.54577 19.3638 4.85231 19.518 5.212L22 11V21C22 21.2652 21.8946 21.5196 21.7071 21.7071C21.5196 21.8946 21.2652 22 21 22H20C19.7348 22 19.4804 21.8946 19.2929 21.7071C19.1054 21.5196 19 21.2652 19 21V20ZM20 13H4V18H20V13ZM4.176 11H19.824L17.681 6H6.32L4.176 11ZM6.5 17C6.10218 17 5.72064 16.842 5.43934 16.5607C5.15804 16.2794 5 15.8978 5 15.5C5 15.1022 5.15804 14.7206 5.43934 14.4393C5.72064 14.158 6.10218 14 6.5 14C6.89782 14 7.27936 14.158 7.56066 14.4393C7.84196 14.7206 8 15.1022 8 15.5C8 15.8978 7.84196 16.2794 7.56066 16.5607C7.27936 16.842 6.89782 17 6.5 17ZM17.5 17C17.1022 17 16.7206 16.842 16.4393 16.5607C16.158 16.2794 16 15.8978 16 15.5C16 15.1022 16.158 14.7206 16.4393 14.4393C16.7206 14.158 17.1022 14 17.5 14C17.8978 14 18.2794 14.158 18.5607 14.4393C18.842 14.7206 19 15.1022 19 15.5C19 15.8978 18.842 16.2794 18.5607 16.5607C18.2794 16.842 17.8978 17 17.5 17Z"
                                       fill="#868686" />
                               </svg>
                           </span>
                           {{ Form::label('parking', 'Parking:', ['class' => 'svg-label']) }}
                           <div class="form-check form-check-inline ms-4">
                               {{ Form::radio('parking', 1, true, ['class' => 'form-check-input', 'id' => 'inlineRadio1']) }}
                               {{ Form::label('inlineRadio1', 'Yes', ['class' => 'form-check-label']) }}
                           </div>
                           <div class="form-check form-check-inline">
                               {{ Form::radio('parking', 0, false, ['class' => 'form-check-input', 'id' => 'inlineRadio2']) }}
                               {{ Form::label('inlineRadio2', 'No', ['class' => 'form-check-label']) }}
                           </div>
                       </div>
                   </div>

                   <div class="Bedroom area-section">
                       <div class="d-flex align-items-center">
                           <span class="mx-2">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                   fill="none">
                                   <path
                                       d="M19 20H5V21C5 21.2652 4.89464 21.5196 4.70711 21.7071C4.51957 21.8946 4.26522 22 4 22H3C2.73478 22 2.48043 21.8946 2.29289 21.7071C2.10536 21.5196 2 21.2652 2 21V11L4.48 5.212C4.63432 4.852 4.89096 4.54524 5.21805 4.32978C5.54515 4.11432 5.92832 3.99965 6.32 4H17.68C18.0713 4.00004 18.4541 4.1149 18.7808 4.33033C19.1075 4.54577 19.3638 4.85231 19.518 5.212L22 11V21C22 21.2652 21.8946 21.5196 21.7071 21.7071C21.5196 21.8946 21.2652 22 21 22H20C19.7348 22 19.4804 21.8946 19.2929 21.7071C19.1054 21.5196 19 21.2652 19 21V20ZM20 13H4V18H20V13ZM4.176 11H19.824L17.681 6H6.32L4.176 11ZM6.5 17C6.10218 17 5.72064 16.842 5.43934 16.5607C5.15804 16.2794 5 15.8978 5 15.5C5 15.1022 5.15804 14.7206 5.43934 14.4393C5.72064 14.158 6.10218 14 6.5 14C6.89782 14 7.27936 14.158 7.56066 14.4393C7.84196 14.7206 8 15.1022 8 15.5C8 15.8978 7.84196 16.2794 7.56066 16.5607C7.27936 16.842 6.89782 17 6.5 17ZM17.5 17C17.1022 17 16.7206 16.842 16.4393 16.5607C16.158 16.2794 16 15.8978 16 15.5C16 15.1022 16.158 14.7206 16.4393 14.4393C16.7206 14.158 17.1022 14 17.5 14C17.8978 14 18.2794 14.158 18.5607 14.4393C18.842 14.7206 19 15.1022 19 15.5C19 15.8978 18.842 16.2794 18.5607 16.5607C18.2794 16.842 17.8978 17 17.5 17Z"
                                       fill="#868686" />
                               </svg>
                           </span>
                           {{ Form::label('area', 'Area:', ['class' => 'svg-label']) }}
                           {{ Form::text('area', null, ['class' => 'AmenitiesInput', 'placeholder' => '170 M2']) }}
                           @if ($errors->has('area'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('area') }}</strong>
                               </span>
                           @endif
                       </div>
                   </div>

               </div>
           </div>
       </div>

   </div>

   <div class="col-lg-12">
       <div class="form-group{{ $errors->has('property_service_id') ? ' has-error' : '' }}">
           {{ Form::select('property_service_id', $services, 0, ['class' => 'form-select fa', 'aria-label' => 'Default select example']) }}
           {{ Form::label('property_service_id', 'Property Service', ['class' => 'lab-style']) }}
           @if ($errors->has('property_service_id'))
               <span class="help-block">
                   <strong>{{ $errors->first('property_service_id') }}</strong>
               </span>
           @endif
       </div>
   </div>

   @section('page_scripts')
       <script type="text/javascript">
           function toggleAmenitiesFields(propertyType) {

               if (propertyType === '1') {
                   $('.bathroom-section').show();
                   $('.bedroom-section').show();
                   $('.parking-section').show();
                   $('.area-section').show();

                   $('#inlineRadio1').prop('checked', true);
                   $('#bathrooms').val(1);
                   $('#bedrooms').val(1);

               } else if (propertyType === '2') {
                   $('.bathroom-section').hide();
                   $('.bedroom-section').hide();
                   $('.parking-section').hide();
                   $('.area-section').show();

                   $('#inlineRadio2').prop('checked', true);
                   $('#bathrooms').val(null);
                   $('#bedrooms').val(null);

               } else if (propertyType === '3') {
                   $('.bathroom-section').show();
                   $('.bedroom-section').hide();
                   $('.parking-section').hide();
                   $('.area-section').show();

                   $('#inlineRadio2').prop('checked', true);
                   $('#bathrooms').val(1);
                   $('#bedrooms').val(null);

               }
           }

           toggleAmenitiesFields($('#Property').val());

           $('#Property').on('change', function() {
               var selectedPropertyType = $(this).val();
               toggleAmenitiesFields(selectedPropertyType);
           });
       </script>
   @endsection
