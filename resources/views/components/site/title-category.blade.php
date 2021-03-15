{{-- <x-title-category icon="fa fa-link" :categoryName="$categoryName" :cssName="$cssName"/> --}}
<div class="text-xl mt-8 pb-4 border-t-8 {{is_null($cssName)?"border-sssebackground-dark dark:border-sssebackground-darkest":"border-".$cssName}}">
  <i class="{{$icon}}"></i>
  {{$categoryName}}
</div>