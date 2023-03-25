<?php

namespace App\Http\Controllers\backend\player;

use App\Models\PlayerInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PlayerInfoController extends Controller
{
    public function personalInfoSave(Request $request)
    {
        $playerInfo = PlayerInfo::where("player_id", Auth::user()->id)->first();
        $playerInfo->gender = $request->gender;
        $playerInfo->dob = $request->dob;
        $playerInfo->birth_country = $request->countryOfBirth;
        $playerInfo->birth_city = $request->cityOfBirth;
        $playerInfo->citizenship_country = $request->countryOfCitizenship;
        $playerInfo->height = $request->height;
        $playerInfo->weight = $request->weight;
        $playerInfo->profile_link = $request->profile;
        $playerInfo->save();
        return redirect()->back()->with("success", "Personal information has been updated successfully!");
    }
    public function basicInfoSave(Request $request)
    {
        $playerInfo = PlayerInfo::where("player_id", Auth::user()->id)->first();
        $playerInfo->eu_passport = $request->passport;
        $playerInfo->languages = json_encode($request->languages);
        $playerInfo->main_position = $request->mainPosition;
        $playerInfo->alternative_position = $request->alternatePosition;
        $playerInfo->preferred_foot = $request->preferredFoot;
        $playerInfo->speed = $request->speed;
        $playerInfo->have_agent = $request->haveAgent;
        $playerInfo->save();
        return redirect()->back()->with("success", "Basic information has been updated successfully!");
    }
    public function careerInfoSave(Request $request)
    {
        $playerInfo = PlayerInfo::where("player_id", Auth::user()->id)->first();
        $playerInfo->status = $request->status;
        $playerInfo->career_level = $request->careerLevel;
        $playerInfo->current_club = $request->currentClub;
        $playerInfo->league_division = $request->leagueDivision;
        $playerInfo->career_country = $request->careerCountry;
        $playerInfo->career_city = $request->careerCity;
        $playerInfo->contract_start_date = $request->contractStartDate;
        $playerInfo->contract_expiry_date = $request->contractExpiryDate;
        $playerInfo->national_team_player = $request->nationalTeamPlayer;
        $playerInfo->international_caps = $request->internationalCaps;
        $playerInfo->training_compensation_to_previous_club = $request->trainingCompensation;
        $playerInfo->transfer_fee_to_previous_club = $request->transferFee;
        $playerInfo->monthly_salary_target = $request->monthlySalaryTarget;
        $playerInfo->current_market_value = $request->currentMarketValue;
        $playerInfo->save();
        return redirect()->back()->with("success", "Career information has been updated successfully!");
    }
    public function coverImgSave(Request $request)
    {
        $validated = $request->validate([
            'coverImage' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        // remove previous image
        if ($request->oldImage) {
            unlink($request->oldImage);
        }
        //upload image
        $imgName = time() . '.' . $request->coverImage->extension();
        $uploadLocation = "backend/images/players/cover/";
        $request->coverImage->move(public_path("backend/images/players/cover/"), $imgName);
        // save image
        $playerInfo = PlayerInfo::where("player_id", Auth::user()->id)->first();
        $playerInfo->cover_img = $uploadLocation . $imgName;
        $playerInfo->save();
        return redirect()->back()->with("success", "Basic information has been updated successfully!");
    }

    public function profileImgSave(Request $request)
    {
        $validated = $request->validate([
            'profileImage' => 'required|image|mimes:jpeg,png,jpg,svg|max:8048',
        ]);
        // remove previous image
        if ($request->oldImage) {
            unlink($request->oldImage);
        }
        //upload image
        $imgName = time() . '.' . $request->profileImage->extension();
        $uploadLocation = "backend/images/players/profile/";
        $request->profileImage->move(public_path("backend/images/players/profile/"), $imgName);

        // save image
        $playerInfo = PlayerInfo::where("player_id", Auth::user()->id)->first();
        // dd($playerInfo);
        $playerInfo->profile_img = $uploadLocation . $imgName;
        $playerInfo->save();
        return redirect()->back()->with("success", "Basic information has been updated successfully!");
    }
    public function mediaVideosSave(Request $request)
    {
        $playerInfo = PlayerInfo::where("player_id", Auth::user()->id)->first();
        $playerInfo->media_video1 = $request->videoLink1;
        $playerInfo->media_video2 = $request->videoLink2;
        $playerInfo->media_video3 = $request->videoLink3;
        $playerInfo->media_video4 = $request->videoLink4;
        $playerInfo->media_video5 = $request->videoLink5;
        $playerInfo->save();
        return redirect("/dashboard/player/profile")->with("video-links-success", "Video Links has been updated successfully!");
    }

    ///==================================================================================
    public function mediaImagesSave(Request $request)
    {
        $playerInfo = PlayerInfo::where("player_id", Auth::user()->id)->first();
        //upload image
        if ($request->image1) {
            // remove previous image
            // if ($request->oldImage1) {
            //     unlink($request->oldImage1);
            // }
            $imgName1 = time() . '.' . $request->image1->extension();
            // dd($imgName1);
            $uploadLocation1 = "backend/images/players/media/";
            $request->image1->move(public_path("backend/images/players/media/"), $imgName1);
            $playerInfo->media_img1 = $uploadLocation1 . $imgName1;
        }

        //upload image
        if ($request->image2) {
            // remove previous image
            // if ($request->oldImage2) {
            //     unlink($request->oldImage2);
            // }
            $imgName2 = time() . '.' . $request->image2->extension();
            $uploadLocation2 = "backend/images/players/media/";
            $request->image2->move(public_path("backend/images/players/media/"), $imgName2);
            $playerInfo->media_img2 = $uploadLocation2 . $imgName2;
        }

        //upload image
        if ($request->image3) {
            // remove previous image
            // if ($request->oldImage3) {
            //     unlink($request->oldImage3);
            // }
            $imgName3 = time() . '.' . $request->image3->extension();
            $uploadLocation3 = "backend/images/players/media/";
            $request->image3->move(public_path("backend/images/players/media/"), $imgName3);
            $playerInfo->media_img3 = $uploadLocation3 . $imgName3;
        }

        //upload image
        if ($request->image4) {
            // remove previous image
            // if ($request->oldImage4) {

            //     unlink($request->oldImage4);
            // }
            $imgName4 = time() . '.' . $request->image4->extension();
            $uploadLocation4 = "backend/images/players/media/";
            $request->image4->move(public_path("backend/images/players/media/"), $imgName4);
            $playerInfo->media_img4 = $uploadLocation4 . $imgName4;
        }

        //upload image
        if ($request->image5) {
            // remove previous image
            // if ($request->oldImage5) {
            //     unlink($request->oldImage5);
            // }
            $imgName5 = time() . '.' . $request->image5->extension();
            $uploadLocation5 = "backend/images/players/media/";
            $request->image5->move(public_path("backend/images/players/media/"), $imgName5);
            $playerInfo->media_img5 = $uploadLocation5 . $imgName5;
        }

        // save image
        $playerInfo->save();
        return redirect()->back()->with("images-success", "Media Images has been updated successfully!");
    }
}
