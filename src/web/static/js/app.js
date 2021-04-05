var app = angular.module("myApp", []);
app.controller('tagsCtrl', function ($scope) {
    $scope.uncheckCheckboxes = function () {
        $scope.tags = {
            bug: false,
            functionality: false,
            siteContent: false,
            design: false
        };
    };
});
app.controller('mainCtrl', function ($scope) {
    $scope.updateSubject = function (text) {
        $scope.subject = text;
    };
    $scope.reset = function () {
        angular.element(document.querySelector('#messageContent')).empty();
        $scope.subject = '';
        $scope.msgContent = '';
    };
});
app.controller('subjectTextbox', function ($scope) {
    $scope.subject = '';
    $scope.isEmpty = function () {
        if ($scope.subject.length === 0 || typeof $scope.subject === 'undefined') {
            $scope.msg = "To pole jest wymagane!";
        }
        else {
            $scope.msg = '';
        }
    };
});
