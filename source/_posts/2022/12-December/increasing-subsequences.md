---
extends: _layouts.post
section: content
title: Increasing subsequences
problemUrl: https://leetcode.com/problems/increasing-subsequences/
date: 2022-12-13
categories: [backtracking]
---

We will use backtracking to get all the subsequence of the array. We will keep on iterating over the array and we will check whether the current element is greater than the last element of the current subsequence. If it is, we will add the current element to the current subsequence and we will call the function recursively. At the end, we will return the subsequence.

```python
class Solution:
    def findSubsequences(self, nums: List[int]) -> List[List[int]]:
        self.subsequences = set()
        self.backtrack(nums, [])
        return self.subsequences

    def backtrack(self, nums, subsequence):
        if len(subsequence) > 1:
            self.subsequences.add(tuple(subsequence))

        for i in range(len(nums)):
            if not subsequence or nums[i] >= subsequence[-1]:
                self.backtrack(nums[i+1:], subsequence + [nums[i]])
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(n^2)`

We can achieve it in a different way too.

```python
class Solution:
    def findSubsequences(self, nums: List[int]) -> List[List[int]]:
        res = []
        def subsets(index, temp):
            if len(nums) >= index and len(temp) >= 2:
                res.append(temp[:])
            used = set()
            for i in range(index, len(nums)):
                if len(temp) > 0 and temp[-1] > nums[i]: 
                    continue
                if nums[i] in used: 
                    continue
                
                used.add(nums[i])
                temp.append(nums[i])
                subsets(i+1, temp)
                temp.pop()
        
        subsets(0, [])
        return res
```