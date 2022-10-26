---
extends: _layouts.post
section: content
title: Longest uploaded prefix
problemUrl: https://leetcode.com/problems/longest-uploaded-prefix/
date: 2022-10-26
categories: [heap, design]
---

We will use a longest flag and a list to store all the videos. Since the prefix cannot decrease, it is enough for us to increase it until we reach the number that has not yet been added. We will iterate all videos. For each video, we will check if the video is already in the list. If it is not, we will add it to the list and increase the longest flag. Then we will return the longest flag.

```python
class LUPrefix:
    def __init__(self, n: int):
        self._longest = 0
        self._nums = set()

    def upload(self, video: int) -> None:
        self._nums.add(video)
        while self._longest+1 in self._nums:
            self._longest += 1

    def longest(self) -> int:
        return self._longest

# Your LUPrefix object will be instantiated and called as such:
# obj = LUPrefix(n)
# obj.upload(video)
# param_2 = obj.longest()
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`