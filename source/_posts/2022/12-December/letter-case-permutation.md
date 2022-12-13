---
extends: _layouts.post
section: content
title: Letter case permutation
problemUrl: https://leetcode.com/problems/letter-case-permutation/
date: 2022-12-13
categories: [backtracking]
---

We will use backtracking to solve this problem. We will iterate over the string and if we encounter a letter, we will add the lowercase and uppercase version of the letter to the result. If we encounter a digit, we will just add the digit to the result.

```python
class Solution:
    def letterCasePermutation(self, s: str) -> List[str]:
        result = []
        self.backtrack(s, 0, result, "")
        return result

    def backtrack(self, s, index, result, current):
        if index == len(s):
            result.append(current)
            return

        if s[index].isalpha():
            self.backtrack(s, index+1, result, current+s[index].lower())
            self.backtrack(s, index+1, result, current+s[index].upper())
        else:
            self.backtrack(s, index+1, result, current+s[index])
```

Time complexity: `O(2^n)` <br/>
Space complexity: `O(2^n)`

We can use python's array interpolation to make the code more concise.

```python
class Solution:
    def letterCasePermutation(self, s: str) -> List[str]:
        res = ['']
        for ch in s:
            if ch.isalpha():
                res = [i+j for i in res for j in [ch.upper(), ch.lower()]]
            else:
                res = [i+ch for i in res]
        return res
```
