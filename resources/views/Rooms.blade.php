<select  name="room_no" class="selectpicker" data-style="btn-success">

    @foreach($floors as $floor)
        <optgroup label="{{$floor->floor}} Mərtəbə">

            @foreach($free_rooms as $room)
                @if($room->floor==$floor->floor && $room->busy_status==0)

                    <option value="{{$room->id}}">{{$room->room_name}}</option>

                @endif
            @endforeach
        </optgroup>
    @endforeach
</select>