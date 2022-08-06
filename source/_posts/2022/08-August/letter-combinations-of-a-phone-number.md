---
extends: _layouts.post
section: content
title: Letter combinations of a phone number
problemUrl: https://leetcode.com/problems/letter-combinations-of-a-phone-number/
date: 2022-08-06
categories: [backtracking]
---

We will create a hashmap to map all the digits to the characters. The we will run backtracking to get all possible combinations of those characters and return the result.

```python
class Solution:
    def letterCombinations(self, digits: str) -> List[str]:
        digitToChar = {
            "2": "abc",
            "3": "def",
            "4": "ghi",
            "5": "jkl",
            "6": "mno",
            "7": "qprs",
            "8": "tuv",
            "9": "wxyz",
        }
        
        res = []
        
        def backtrack(i, curStr):
            if len(curStr) == len(digits):
                res.append(curStr)
                return
            for c in digitToChar[digits[i]]:
                backtrack(i+1, curStr+c)
        
        if digits:
            backtrack(0, "")
            
        return res
```

Time Complexity: `O(n*n!)`
Space Complexity: `O(n!)`