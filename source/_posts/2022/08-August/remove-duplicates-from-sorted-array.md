---
extends: _layouts.post
section: content
title: Remove duplicates from sorted array
problemUrl: https://leetcode.com/problems/remove-duplicates-from-sorted-array/
date: 2022-08-29
categories: [array-and-hashmap]
---

We will iterate over each element from index 1 to the end of the list, if 2 consecutive numbers are equals, we convert the first number to 101, as out input list could have numbers upto 100. Then we sort them, and count the number of elements which are not 101, and finally return the count.

```python
class Solution:
    def removeDuplicates(self, nums: List[int]) -> int:
        for i in range(1, len(nums)):
            if nums[i-1] == nums[i]:
                nums[i-1] = 101
        nums.sort()

        count = 0
        for n in nums:
            if n != 101:
                count += 1
        return count
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(1)`