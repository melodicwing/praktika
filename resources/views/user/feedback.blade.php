@extends('template')

@section('content')
	<h3>Обратная связь</h3>
	<br>
	<form>
		<div class='row'>
			<div class='col-xs-1'>
			</div>
			<div class='col-xs-5'>
				<div class="form-group">
					<label for="input_fio">ФИО:</label>
					<input type="text" class="form-control" id="input_fio" name='fio'>
				</div>
				<div class="form-group">
					<label for="input_tel">Номер телефона:</label>
					<input type="text" class="form-control" id="input_tel" name='tel'>
				</div>
				<div class="form-group">
					<label>Пол:</label>
					<div class='radio'>
						<label><input type="radio" value='male' name='sex'>Человек</label>
					</div>
					<div class='radio'>
						<label><input type="radio" value='female' name='sex'>Женщина</label>
					</div>
				</div>
				<div class="form-group">
					<label for="age">Возраст:</label>
					<select class="form-control" id="select_age" name='age'>
						<OPTION value=0> -- выберите возраст --</OPTION>
						<OPTION value=1> 1</OPTION>
						<OPTION value=2> 2</OPTION>
						<OPTION value=3> 3</OPTION>
						<OPTION value=4> 4</OPTION>
						<OPTION value=5> 5</OPTION>
						<OPTION value=6> 6</OPTION>
						<OPTION value=7> 7</OPTION>
						<OPTION value=8> 8</OPTION>
						<OPTION value=9> 9</OPTION>
						<OPTION value=10> 10</OPTION>
						<OPTION value=11> 11</OPTION>
						<OPTION value=12> 12</OPTION>
						<OPTION value=13> 13</OPTION>
						<OPTION value=14> 14</OPTION>
						<OPTION value=15> 15</OPTION>
						<OPTION value=16> 16</OPTION>
						<OPTION value=17> 17</OPTION>
						<OPTION value=18> 18</OPTION>
						<OPTION value=19> 19</OPTION>
						<OPTION value=20> 20</OPTION>
						<OPTION value=21> 21</OPTION>
						<OPTION value=22> 22</OPTION>
						<OPTION value=23> 23</OPTION>
						<OPTION value=24> 24</OPTION>
						<OPTION value=25> 25</OPTION>
						<OPTION value=26> 26</OPTION>
						<OPTION value=27> 27</OPTION>
						<OPTION value=28> 28</OPTION>
						<OPTION value=29> 29</OPTION>
						<OPTION value=30> 30</OPTION>
						<OPTION value=31> 31</OPTION>
						<OPTION value=32> 32</OPTION>
						<OPTION value=33> 33</OPTION>
						<OPTION value=34> 34</OPTION>
						<OPTION value=35> 35</OPTION>
						<OPTION value=36> 36</OPTION>
						<OPTION value=37> 37</OPTION>
						<OPTION value=38> 38</OPTION>
						<OPTION value=39> 39</OPTION>
						<OPTION value=40> 40</OPTION>
						<OPTION value=41> 41</OPTION>
						<OPTION value=42> 42</OPTION>
						<OPTION value=43> 43</OPTION>
						<OPTION value=44> 44</OPTION>
						<OPTION value=45> 45</OPTION>
						<OPTION value=46> 46</OPTION>
						<OPTION value=47> 47</OPTION>
						<OPTION value=48> 48</OPTION>
						<OPTION value=49> 49</OPTION>
						<OPTION value=50> 50</OPTION>
						<OPTION value=51> 51</OPTION>
						<OPTION value=52> 52</OPTION>
						<OPTION value=53> 53</OPTION>
						<OPTION value=54> 54</OPTION>
						<OPTION value=55> 55</OPTION>
						<OPTION value=56> 56</OPTION>
						<OPTION value=57> 57</OPTION>
						<OPTION value=58> 58</OPTION>
						<OPTION value=59> 59</OPTION>
						<OPTION value=60> 60</OPTION>
						<OPTION value=61> 61</OPTION>
						<OPTION value=62> 62</OPTION>
						<OPTION value=63> 63</OPTION>
						<OPTION value=64> 64</OPTION>
						<OPTION value=65> 65</OPTION>
						<OPTION value=66> 66</OPTION>
						<OPTION value=67> 67</OPTION>
						<OPTION value=68> 68</OPTION>
						<OPTION value=69> 69</OPTION>
						<OPTION value=70> 70</OPTION>
						<OPTION value=71> 71</OPTION>
						<OPTION value=72> 72</OPTION>
						<OPTION value=73> 73</OPTION>
						<OPTION value=74> 74</OPTION>
						<OPTION value=75> 75</OPTION>
						<OPTION value=76> 76</OPTION>
						<OPTION value=77> 77</OPTION>
						<OPTION value=78> 78</OPTION>
						<OPTION value=79> 79</OPTION>
						<OPTION value=80> 80</OPTION>
						<OPTION value=81> 81</OPTION>
						<OPTION value=82> 82</OPTION>
						<OPTION value=83> 83</OPTION>
						<OPTION value=84> 84</OPTION>
						<OPTION value=85> 85</OPTION>
						<OPTION value=86> 86</OPTION>
						<OPTION value=87> 87</OPTION>
						<OPTION value=88> 88</OPTION>
						<OPTION value=89> 89</OPTION>
						<OPTION value=90> 90</OPTION>
						<OPTION value=91> 91</OPTION>
						<OPTION value=92> 92</OPTION>
						<OPTION value=93> 93</OPTION>
						<OPTION value=94> 94</OPTION>
						<OPTION value=95> 95</OPTION>
						<OPTION value=96> 96</OPTION>
						<OPTION value=97> 97</OPTION>
						<OPTION value=98> 98</OPTION>
						<OPTION value=99> 99</OPTION>
						<OPTION value=100> 100</OPTION>
					</select>
				</div>
				<div class="form-group">
					<label for="input_email">Email:</label>
					<input type="text" class="form-control" id="input_email" name='email'>
				</div>
			</div>
			<div class='col-xs-5'>
				<div class="form-group">
					<label for="input_msg">Сообщение:</label>
					<textarea class="form-control" rows='16' id="textarea_msg" name='msg'></textarea>
				</div>
			</div>
		</div>
		<div class='col-xs-12 text-center'>
			<button type="submit" class="btn btn-success" value='Submit' id='button_submit'>Отправить</button>
		</div>
	</form>
	<script>
		$('#button_submit').click(function(){
			alert('Спасибо за отзыв :)))))');
			alert('Ваше мнение важно для нас :)))))))))0000000000000_________________');
			alert('ржака');
		});
	</script>
@endsection
