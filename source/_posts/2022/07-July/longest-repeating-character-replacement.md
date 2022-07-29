---
extends: _layouts.post
section: content
title: Longest repeating character replacement
problemUrl: https://leetcode.com/problems/longest-repeating-character-replacement/
date: 2022-07-29
categories: [sliding-window]
---

We will take a sliding window to solve this problem. We will take a left and right pointer, initially both will be at 0-th index. Then we move our right pointer and count the number of occurances, store it in a hashmap. We will also keep track of the most frequent character of the hashmap. Then we calculate, whether the length of out sliding window minus the most frequent character is less than or equal to the the maximum number of character allowed to change. We will then update the length of our result to keep track of maximum window length. If not, the we slide our left pointer and also update the count of the character in our hashmap. When the right pointer reaches the last character of the string, we return the result.


```python
class Solution:
    def characterReplacement(self, s: str, k: int) -> int:
        count = {}
        res = 0

        left = 0
        maxf = 0
        for right in range(len(s)):
            count[s[right]] = 1 + count.get(s[right], 0)
            maxf = max(maxf, count[s[right]])

            if (right-left+1) - maxf > k:
                count[s[left]] -= 1
                left += 1

            res = max(res, right-left+1)
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`