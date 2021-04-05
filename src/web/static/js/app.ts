var app = angular.module("myApp", []);

app.controller('tagsCtrl', ($scope) => {
     $scope.uncheckCheckboxes = () => {
        $scope.tags = {
            bug: false,
            functionality: false,
            siteContent: false,
            design: false
        }
     }
});

app.controller('mainCtrl', ($scope) => {
    $scope.updateSubject = (text: string) => {
        $scope.subject = text;
    }

    $scope.reset = () => {
        angular.element(document.querySelector('#messageContent')).empty();
        $scope.subject = '';
        $scope.msgContent = '';
    }
});

app.controller('subjectTextbox', ($scope) => {
    $scope.subject = '';
    $scope.isEmpty = () => {
        if($scope.subject.length === 0 || typeof $scope.subject === 'undefined') {
            $scope.msg = "To pole jest wymagane!";
        } else {
            $scope.msg = '';
        }
    }
});